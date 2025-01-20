
@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert" id="success-alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<script>
    setTimeout(() => {
        const alert = document.getElementById('success-alert');
        if (alert) {
            alert.classList.remove('show'); // Hides the alert with Bootstrap's fade-out animation
            alert.classList.add('fade'); // Ensures proper fade-out transition
            setTimeout(() => alert.remove(), 500); // Removes the element after the transition
        }
    }, 5000); // 5000ms = 5 seconds
</script>
@endif
@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert" id="danger-alert">
        <strong>Error!</strong> There were some problems with your input.
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif



<script>
    setTimeout(() => {
        const alert = document.getElementById('danger-alert');
        if (alert) {
            alert.classList.remove('show'); // Hides the alert with Bootstrap's fade-out animation
            alert.classList.add('fade'); // Ensures proper fade-out transition
            setTimeout(() => alert.remove(), 500); // Removes the element after the transition
        }
    }, 10000); // 5000ms = 5 seconds
</script>
