<script>
    @if(session('success'))
        $.toast({
            title: "Success",
            message: "{!! session('success') !!}",
            type: "success",
            duration: 5000,
        });
    @elseif(isset($success))
        $.toast({
            title: "Success",
            message: "{!! $success !!}",
            type: "success",
            duration: 5000,
        });
    @endif

    @if(session('error'))
        $.toast({
            title: "Error",
            message: "{!! session('error') !!}",
            type: "error",
            duration: 3000,
        });
    @elseif(isset($error))
        $.toast({
            title: "Error",
            message: "{!! $error !!}",
            type: "error",
            duration: 3000,
        });
    @elseif($errors->any())
        var errorMessage = '';
        @foreach($errors->all() as $error)
            errorMessage += '<div>{{ $error }}</div>';
        @endforeach

        $.toast({
            title: "Validation Error",
            message: errorMessage,
            type: "error",
            duration: 5000,
        });
    @endif
</script>