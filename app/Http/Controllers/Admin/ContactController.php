<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Application\Contacts\RegisterContact;
use App\Application\Contacts\GetById;
use App\Application\Users\GetAuthenticatedUser;
use App\Application\Auth\AuthorizeUser;
use App\Http\Resources\ContactResource;
use App\Http\Resources\RegisterContactResource;
use App\Application\Contacts\GetAll;
use App\Http\Resources\AllContactCollection;
use App\Http\Resources\Contact\MarkAsReadResource;
use App\Application\Contacts\MarkAsRead;
use App\Http\Resources\Contact\MarkAsRepliedResource;
use App\Http\Resources\Contact\GetBrowserInfoAttributeResource;
use App\Application\Contacts\MarkAsReplied;
use App\Application\Contacts\GetBrowserInfoAttribute;
use App\Application\Contacts\GetStatusTextAttribute;
use App\Http\Resources\Contact\GetStatusTextAttributeResource;
use App\Http\Resources\Contact\GetTimeAgoAttributeResource;
use App\Application\Contacts\GetTimeAgoAttribute;
use App\Application\Contacts\IsNew;
use App\Application\Contacts\IsRead;
use App\Application\Contacts\IsReplied;
use App\Http\Resources\Contact\IsStatusResource;
use App\Application\Contacts\MarkAsArchived;
use App\Http\Resources\Contact\MarkAsArchivedResource;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(
        private readonly RegisterContact $registerContact,
        private readonly GetAuthenticatedUser $getAuthenticatedUser,
        private readonly GetById $getById,
        private readonly AuthorizeUser $authorizeUser,
        private readonly GetAll $getAll,
        private readonly MarkAsRead $markAsRead,
        private readonly MarkAsReplied $markAsReplied,
        private readonly GetBrowserInfoAttribute $getBrowserInfoAttribute,
        private readonly GetStatusTextAttribute $getStatusTextAttribute,
        private readonly GetTimeAgoAttribute $getTimeAgoAttribute,
        private readonly IsNew $isNew,
        private readonly IsRead $isRead,
        private readonly IsReplied $isReplied,
        private readonly MarkAsArchived $markAsArchived,
    ) {}




    public function index(Request $request)
    {
        $query = Contact::query();

        
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', "%{$request->search}%")
                    ->orWhere('email', 'like', "%{$request->search}%")
                    ->orWhere('subject', 'like', "%{$request->search}%")
                    ->orWhere('company', 'like', "%{$request->search}%");
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }

        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        // Ordenamiento
        $sortBy = $request->get('sort_by', 'created_at');
        $sortOrder = $request->get('sort_order', 'desc');
        $query->orderBy($sortBy, $sortOrder);

        $contacts = $query->paginate(15)->appends($request->query());

        // Estadísticas
        $stats = [
            'total' => Contact::count(),
            'new' => Contact::where('status', 'new')->count(),
            'read' => Contact::where('status', 'read')->count(),
            'replied' => Contact::where('status', 'replied')->count(),
            'this_month' => Contact::whereMonth('created_at', now()->month)
                ->whereYear('created_at', now()->year)
                ->count(),
        ];

        // return Inertia::render('Admin/Contacts/Index', [
        //     'contacts' => $contacts,
        //     'stats' => $stats,
        //     'filters' => $request->only(['search', 'status', 'date_from', 'date_to']),
        // ]);
    }
     
    public function registerContact(Request $request)
    {
       $this->authorize($request);

        try {
            $request->validate([
                'name' => 'required|string|max:255|min:2',
                'email' => 'required|email|max:255',
                'phone' => 'nullable|string|max:20',
                'company' => 'nullable|string|max:255',
                'subject' => 'required|string|max:255|min:5',
                'message' => 'required|string|max:2000|min:10',
            ]);

            $contact = $this->registerContact->execute($request->all());

            return (new RegisterContactResource($contact))
                ->response()
                ->setStatusCode(201);

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al registrar contacto',
                'message' => $e->getMessage(),
            ], 500);
        }
    }
   
    public function getById(Request $request, int $id)
    {        
       $this->authorize($request);
       try{
            $contact = $this->getById->execute($id);

            if (!$contact) {
                return response()->json([
                    'error' => 'Contacto no encontrado',
                    'message' => 'No se pudo encontrar un contacto con el ID número ' . $id,
                ], 404);
            }

            return new ContactResource($contact);

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al obtener contacto',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function getAll(Request $request)
    {
        $this->authorize($request);
        try{
            $contacts = $this->getAll->execute();

            return (new AllContactCollection($contacts))
                ->response()
                ->setStatusCode(200);

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al obtener contactos',
                'message' => $e->getMessage(),
            ], 500);
        }
    }
    /**
     * Mark contact as read
     */
    public function markAsRead(Request $request, int $id)
    {
        $this->authorize($request);

        try {
            $contact = Contact::find($id);
            if (!$contact) {
                return response()->json(['error' => 'Contacto no encontrado'], 404);
            }
            $this->markAsRead->execute($id);

            return new MarkAsReadResource($request);

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al marcar como leído',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Mark contact as replied
     */
    public function markAsReplied(Request $request, int $id)
    {
        try {
             $this->authorize($request);
             $this->markAsReplied->execute($id);

            return new MarkAsRepliedResource($request);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al marcar como respondido',
                'message' => $e->getMessage(),
            ], 500);
        }
       
    }

     /**
     * Get browser info attribute
     */
    public function getBrowserInfoAttribute(Request $request, int $id)
    {
        $this->authorize($request);

        try {
            $browserInfo = $this->getBrowserInfoAttribute->execute($id);

            return new GetBrowserInfoAttributeResource($browserInfo);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al obtener información del navegador',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    function getStatusTextAttribute(Request $request, int $id)
    {
        $this->authorize($request);

        try {
            $statusText = $this->getStatusTextAttribute->execute($id);

            return new GetStatusTextAttributeResource($statusText);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al obtener texto de estado',
                'message' => $e->getMessage(),
            ], 500);
        }
    }
    
    function getTimeAgoAttribute(Request $request, int $id)
    {
        $this->authorize($request);

        try {
            $timeAgo = $this->getTimeAgoAttribute->execute($id);

            return new GetTimeAgoAttributeResource($timeAgo);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al obtener tiempo transcurrido',
                'message' => $e->getMessage(),
            ], 500);
        }
    }
    
    function isNew(Request $request, int $id)
    {
        $this->authorize($request);

        try {
            $isNew = $this->isNew->execute($id);

            return new IsStatusResource($isNew);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al verificar si es nuevo',
                'message' => $e->getMessage(),
            ], 500);
        }
    }
    function isRead(Request $request, int $id)
    {
        $this->authorize($request);

        try {
            $isRead = $this->isRead->execute($id);

            return new IsStatusResource($isRead);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al verificar si es leído',
                'message' => $e->getMessage(),
            ], 500);
        }
    }
    function isReplied(Request $request, int $id)
    {
        $this->authorize($request);

        try {
            $isReplied = $this->isReplied->execute($id);

            return new IsStatusResource($isReplied);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al verificar si es respondido',
                'message' => $e->getMessage(),
            ], 500);
        }
    }
    /**
     * Archive contact
     */
    public function markAsArchived(Request $request, int $id)
    {
        $this->authorize($request);
        try {
            $contact = Contact::find($id);
            if (!$contact) {
                return response()->json(['error' => 'Contacto no encontrado'], 404);
            }
            $this->markAsArchived->execute($id);

            return new MarkAsArchivedResource($request);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al archivar contacto',
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