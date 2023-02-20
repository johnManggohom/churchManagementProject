<x-admin-layout>
<div>


<livewire:admin.services.services-table>
           
</div>

@push('scripts')
<script>
    window.addEventListener('close-modal', event=>{
        $('#updateServicesModal').modal('hide');
        
    })
</script>
    
@endpush
</x-admin-layout>