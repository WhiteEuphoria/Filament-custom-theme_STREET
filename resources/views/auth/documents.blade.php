@extends('layouts.auth')

@section('title', 'Document Verification')

@section('auth-content')
<form class="enter-block" action="{{ route('documents.submit') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="enter-block__title">Attach your documents for verification</div>
    
    <div class="enter-block__file">
        <label class="file-btn">
            <input type="file" name="document" hidden accept=".png,.jpg,.jpeg,.pdf" required>
            <span class="file-btn__icon">
                <img src="{{ asset('img/icons/download.svg') }}" alt="download">
            </span>
            <span class="file-text">Upload file</span>
        </label>
    </div>
    
    <div class="field">
        <textarea name="additional_info" placeholder="Write here..." rows="4"></textarea>
    </div>
    
    <div class="enter-block__info">
        <div class="enter-block__info-item">
            <span>Allowed format</span>
            <br>
            PNG, JPG, JPEG and PDF
        </div>
        <div class="enter-block__info-item">
            <span>Max file size</span>
            <br>
            10MB
        </div>
    </div>
    
    <button type="submit" class="btn btn--light">Send</button>
</form>

@if(session('success'))
<div class="success-message" style="margin-top: 20px;">
    <p>{{ session('success') }}</p>
</div>
@endif

@if($errors->any())
<div class="error-messages" style="margin-top: 20px;">
    @foreach($errors->all() as $error)
        <div class="error-message">{{ $error }}</div>
    @endforeach
</div>
@endif

<div class="auth-links" style="margin-top: 20px;">
    <p><a href="{{ route('dashboard') }}">Back to Dashboard</a></p>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // File input handling
        const fileInput = document.querySelector('input[type="file"]');
        const fileText = document.querySelector('.file-text');
        
        fileInput.addEventListener('change', function() {
            if (this.files.length > 0) {
                const file = this.files[0];
                const fileName = file.name;
                const fileSize = (file.size / (1024 * 1024)).toFixed(2); // Convert to MB
                
                // Check file size (10MB limit)
                if (file.size > 10 * 1024 * 1024) {
                    alert('File size must be less than 10MB');
                    this.value = '';
                    fileText.textContent = 'Upload file';
                    return;
                }
                
                fileText.textContent = `${fileName} (${fileSize}MB)`;
                this.parentElement.classList.add('file-selected');
            } else {
                fileText.textContent = 'Upload file';
                this.parentElement.classList.remove('file-selected');
            }
        });

        // Form validation
        const form = document.querySelector('.enter-block');
        
        form.addEventListener('submit', function(e) {
            if (!fileInput.files.length) {
                e.preventDefault();
                alert('Please select a file to upload');
                fileInput.focus();
            }
        });
    });
</script>
@endpush