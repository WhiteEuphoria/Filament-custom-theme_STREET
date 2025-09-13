@extends('layouts.dashboard')

@section('title', 'Submit Complaint')

@section('dashboard-content')
<div class="container">
    <div class="modal-content">
        <div class="modal-content__top">
            <div class="logo">
                <img src="{{ asset('img/logo.svg') }}" alt="logo">
            </div>
            <div class="modal-content__text">
                <p>Describe your complaint</p>
            </div>
        </div>
        <div class="modal-content__body">
            <form action="{{ route('complaint.submit') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="field">
                    <textarea name="complaint" placeholder="Write here..." rows="8" required></textarea>
                </div>
                <button type="submit" class="btn">Send</button>
                <label class="modal-content__file">
                    <input type="file" name="attachment" hidden accept=".jpg,.jpeg,.png,.pdf,.doc,.docx">
                    <span>
                        Attach the file
                        <img src="{{ asset('img/icons/attach.svg') }}" alt="attach">
                    </span>
                </label>
            </form>
        </div>
    </div>

    @if(session('success'))
    <div class="success-message">
        {{ session('success') }}
    </div>
    @endif

    @if($errors->any())
    <div class="error-messages">
        @foreach($errors->all() as $error)
            <div class="error-message">{{ $error }}</div>
        @endforeach
    </div>
    @endif
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // File input handling
        const fileInput = document.querySelector('input[type="file"]');
        const fileLabel = fileInput.parentElement;
        
        fileInput.addEventListener('change', function() {
            if (this.files.length > 0) {
                const fileName = this.files[0].name;
                fileLabel.querySelector('span').textContent = `File selected: ${fileName}`;
                fileLabel.classList.add('file-selected');
            }
        });

        // Form validation
        const form = document.querySelector('form');
        const textarea = document.querySelector('textarea[name="complaint"]');
        
        form.addEventListener('submit', function(e) {
            if (!textarea.value.trim()) {
                e.preventDefault();
                alert('Please describe your complaint');
                textarea.focus();
            }
        });
    });
</script>
@endpush