<div>
    @if($date_save != null)
        @include('modal.view')
    @endif
    <p onclick="see('{{$date_data}}')" data-bs-toggle="modal" data-bs-target="#view" style="color: #0d6efd; cursor: pointer;">View</p>
</div>
