<x-admin-layout>
<div>


<livewire:admin.organizations.organizations-table>
           
</div>

@push('scripts')
<script>
    window.addEventListener('close-modal', event=>{
        $('#updateOrganizationModal').modal('hide');
        
    })
</script>
    
@endpush
</x-admin-layout>