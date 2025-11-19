<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use App\Application\Category\Create;
use App\Application\Auth\AuthorizeUser;
use App\Http\Resources\Category\CreateResource;
use App\Http\Resources\Category\GetAllCollection;
use App\Http\Resources\Category\GetByIdResource;
use App\Application\Category\GetAll;
use App\Application\Category\GetById;
use App\Application\Category\Delete;
use App\Http\Resources\Category\DeleteResource;
use App\Application\Category\Update;
use App\Http\Resources\Category\UpdateResource;
use App\Application\Category\ToggleActive;
use App\Http\Resources\Category\ToggleActiveResource;



class CategoryController extends Controller
{
    
    public function __construct(
       private readonly Create $create,
       private readonly AuthorizeUser $authorizeUser,
       private readonly GetAll $getAll,
       private readonly GetById $getById,
       private readonly Delete $delete,
       private readonly Update $update,
       private readonly ToggleActive $toggleActive,
    ) {}


    // public function index(Request $request)
    // {
    //     $query = Category::withCount('blogPosts');
        
    //     if ($request->filled('search')) {
    //         $query->where('name', 'like', "%{$request->search}%")
    //             ->orWhere('description', 'like', "%{$request->search}%");
    //     }

    //     if ($request->filled('active')) {
    //         $query->where('active', $request->boolean('active'));
    //     }

    //     // Ordenamiento
    //     $sortBy = $request->get('sort_by', 'sort_order');
    //     $sortOrder = $request->get('sort_order', 'asc');
    //     $query->orderBy($sortBy, $sortOrder);

    //     $categories = $query->paginate(15)->appends($request->query());     
    // }

    /**
     * Creación de una nueva categoría.
     */
    public function create(Request $request)
    {
        $this->authorize($request);
         try {
           $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:categories,slug',
            'description' => 'nullable|string|max:1000',
            'color' => 'nullable|string|max:7|regex:/^#[0-9A-Fa-f]{6}$/',
            'active' => 'boolean',
            'sort_order' => 'nullable|integer|min:0',
        ], [
            'name.required' => 'El nombre de la categoría es obligatorio.',
            'name.max' => 'El nombre no puede tener más de 255 caracteres.',
            'slug.unique' => 'Este slug ya está en uso.',
            'slug.max' => 'El slug no puede tener más de 255 caracteres.',
            'description.max' => 'La descripción no puede tener más de 1000 caracteres.',
            'color.regex' => 'El color debe ser un código hexadecimal válido (ej: #3B82F6).',
            'sort_order.integer' => 'El orden debe ser un número entero.',
            'sort_order.min' => 'El orden debe ser mayor o igual a 0.',
        ]);

            $category = $this->create->execute($validated);

            return (new CreateResource($category))
                ->response()
                ->setStatusCode(201);

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al registrar contacto',
                'message' => $e->getMessage(),
            ], 500);
        }
        
    }
    /**
     * Obtener una categoría por su ID.
     */
   
    public function getById(Request $request, int $id)
    {
        $this->authorize($request);
        try {
            $category = $this->getById->execute($id);
            if (!$category) {
                return response()->json([
                    'error' => 'Categoría no encontrada',
                ], 404);
            }
            return (new GetByIdResource($category))
                ->response()
                ->setStatusCode(200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al obtener la categoría',
                'message' => $e->getMessage(),
            ], 500);
        }
    }
    /**
     * Obtener todas las categorías.
     */
    public function getAll(Request $request)
    {
        $this->authorize($request);
        try {
            $categories = $this->getAll->execute();
            return (new GetAllCollection($categories))
                ->response()
                ->setStatusCode(200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al obtener las categorías',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
       $this->authorize($request);
       try {
           $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => ['nullable', 'string', 'max:255', Rule::unique('categories')->ignore($id)],
            'description' => 'nullable|string|max:1000',
            'color' => 'nullable|string|max:7|regex:/^#[0-9A-Fa-f]{6}$/',
            'active' => 'boolean',
            'sort_order' => 'nullable|integer|min:0',
        ], [
            'name.required' => 'El nombre de la categoría es obligatorio.',
            'name.max' => 'El nombre no puede tener más de 255 caracteres.',
            'slug.unique' => 'Este slug ya está en uso.',
            'slug.max' => 'El slug no puede tener más de 255 caracteres.',
            'description.max' => 'La descripción no puede tener más de 1000 caracteres.',
            'color.regex' => 'El color debe ser un código hexadecimal válido (ej: #3B82F6).',
            'sort_order.integer' => 'El orden debe ser un número entero.',
            'sort_order.min' => 'El orden debe ser mayor o igual a 0.',
        ]);

        $category = $this->update->execute($id, $validated);
        if (!$category) {
            return response()->json([
                'error' => 'Categoría no encontrada',
            ], 404);
        }

        return (new UpdateResource($request))
            ->response()
            ->setStatusCode(200);
       } catch (\Exception $e) {
           return response()->json([
               'error' => 'Error al actualizar la categoría',
               'message' => $e->getMessage(),
           ], 500);
       }
    }

    public function delete(Request $request, int $id)
    {
        $this->authorize($request);
        try {                       
            $category = $this->delete->execute($id);
            return (new DeleteResource($category))
                ->response()
                ->setStatusCode(200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al eliminar la categoría',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Toggle active status
     */
    public function toggleActive(Request $request, int $id)
    {
        $this->authorize($request);
        try {
            $this->toggleActive->execute($id);
            return (new ToggleActiveResource($request))
                ->response()
                ->setStatusCode(200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al cambiar el estado activo de la categoría',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    

    private function authorize(Request $request){
        $authHeader = $request->header('Authorization');
        $plainToken = $request->bearerToken();
        if (! $authHeader && ! $plainToken) {
            return response()->json([
                'error' => 'Token de autorización requerido'], 401);
        }
        $user = $this->authorizeUser->execute($authHeader ?? $plainToken);
        if (! $user) {
            return response()->json([
                'error' => 'Token inválido o expirado'], 401);
        }
    }


}