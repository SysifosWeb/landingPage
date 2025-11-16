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
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();

        // return redirect()->route('admin.contacts.index')
        //     ->with('success', 'Contacto eliminado exitosamente.');
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


            // return response()->json([
            //     'message' => 'Contacto marcado como leído.',
            //     'id' => $contact->id,
            //     'status' => $contact->status,
            // ], 200);
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
    public function markAsReplied(Contact $contact)
    {
        $contact->markAsReplied();

        return back()->with('success', 'Contacto marcado como respondido.');
    }

    /**
     * Archive contact
     */
    public function archive(Contact $contact)
    {
        $contact->update(['status' => 'archived']);

        return back()->with('success', 'Contacto archivado exitosamente.');
    }

    /**
     * Bulk actions
     */
    public function bulkAction(Request $request)
    {
        $request->validate([
            'action' => 'required|in:mark_read,mark_replied,archive,delete',
            'contacts' => 'required|array',
            'contacts.*' => 'exists:contacts,id',
        ]);

        $contacts = Contact::whereIn('id', $request->contacts);

        switch ($request->action) {
            case 'mark_read':
                $contacts->update(['status' => 'read', 'read_at' => now()]);
                $message = 'Contactos marcados como leídos.';
                break;

            case 'mark_replied':
                $contacts->update(['status' => 'replied', 'replied_at' => now()]);
                $message = 'Contactos marcados como respondidos.';
                break;

            case 'archive':
                $contacts->update(['status' => 'archived']);
                $message = 'Contactos archivados.';
                break;

            case 'delete':
                $contacts->delete();
                $message = 'Contactos eliminados.';
                break;
        }

        return back()->with('success', $message);
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