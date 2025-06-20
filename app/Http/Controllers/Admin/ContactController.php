<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Contact::query();

        // Filtros
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

        return Inertia::render('Admin/Contacts/Index', [
            'contacts' => $contacts,
            'stats' => $stats,
            'filters' => $request->only(['search', 'status', 'date_from', 'date_to']),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        // Marcar como leído si es nuevo
        if ($contact->isNew()) {
            $contact->markAsRead();
        }

        return Inertia::render('Admin/Contacts/Show', [
            'contact' => $contact,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('admin.contacts.index')
            ->with('success', 'Contacto eliminado exitosamente.');
    }

    /**
     * Mark contact as read
     */
    public function markAsRead(Contact $contact)
    {
        $contact->markAsRead();

        return back()->with('success', 'Contacto marcado como leído.');
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
}
