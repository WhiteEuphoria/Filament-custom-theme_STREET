@extends('layouts.dashboard')

@section('title', 'Admin Panel')

@section('dashboard-content')
<div class="container">
    <div class="admin-panel">
        <div class="admin-panel__header">
            <h1 class="admin-panel__main-title">Admin Panel</h1>
            <div class="admin-panel__controls">
                <div class="admin-panel__notifications">
                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_57_420)">
                            <path d="M31.6667 13.3335C31.6667 10.6524 30.5999 8.08163 28.7245 6.20625C26.8491 4.33087 24.2783 3.26404 21.5972 3.26404C18.916 3.26404 16.3453 4.33087 14.4699 6.20625C12.5945 8.08163 11.5277 10.6524 11.5277 13.3335C11.5277 25.0002 6.38885 28.3335 6.38885 28.3335H36.8055C36.8055 28.3335 31.6667 25.0002 31.6667 13.3335Z" stroke="#0B69B7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M24.3805 34.9998C24.1073 35.5523 23.677 36.0125 23.1428 36.3267C22.6086 36.6408 21.9954 36.7943 21.3693 36.7665C20.7432 36.7388 20.1444 36.5311 19.6434 36.1715C19.1425 35.8119 18.762 35.3165 18.5527 34.7498" stroke="#0B69B7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </g>
                        <defs>
                            <clipPath id="clip0_57_420">
                                <rect width="40" height="40" fill="white"/>
                            </clipPath>
                        </defs>
                    </svg>
                </div>
                <label class="switch">
                    <input class="switch__input" type="checkbox" aria-label="Toggle admin mode">
                    <span class="switch__track">
                        <span class="switch__thumb"></span>
                    </span>
                </label>
                <button type="button" class="admin-panel__save">
                    Save
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 10L12.258 12.444C12.4598 12.5954 12.7114 12.6649 12.9624 12.6385C13.2133 12.6122 13.445 12.492 13.611 12.302L20 5" stroke="white" stroke-width="2" stroke-linecap="round" />
                        <path d="M21 12C21 13.8805 20.411 15.7138 19.3157 17.2424C18.2203 18.771 16.6736 19.918 14.8929 20.5225C13.1122 21.127 11.1868 21.1585 9.3873 20.6125C7.58776 20.0666 6.00442 18.9707 4.85967 17.4788C3.71492 15.9868 3.06627 14.1738 3.00481 12.2943C2.94335 10.4147 3.47218 8.56317 4.51702 6.99962C5.56187 5.43607 7.07023 4.23908 8.83027 3.57678C10.5903 2.91447 12.5136 2.82011 14.33 3.30696" stroke="white" stroke-width="2" stroke-linecap="round" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Account Information Block -->
        <div class="admin-panel__block">
            <div class="admin-panel__title">Account Info</div>
            <form method="POST" action="{{ route('admin.update-account') }}">
                @csrf
                <div class="admin-panel__grid">
                    <div class="admin-panel__field">
                        <div class="admin-panel__field-label">FullName</div>
                        <input class="admin-panel__field-input" name="full_name" type="text" value="{{ $user->full_name ?? 'I. V. Client' }}" />
                    </div>
                    <div class="admin-panel__field">
                        <div class="admin-panel__field-label">Date of Birth</div>
                        <input class="admin-panel__field-info" name="date_of_birth" type="date" value="{{ $user->date_of_birth ?? '1997-04-21' }}" />
                    </div>
                    <div class="admin-panel__field">
                        <div class="admin-panel__field-label">Country</div>
                        <select name="country" class="admin-panel__field-info">
                            <option value="ES" {{ ($user->country ?? 'ES') == 'ES' ? 'selected' : '' }}>Spain</option>
                            <option value="US" {{ ($user->country ?? 'ES') == 'US' ? 'selected' : '' }}>United States</option>
                            <option value="GB" {{ ($user->country ?? 'ES') == 'GB' ? 'selected' : '' }}>United Kingdom</option>
                            <option value="DE" {{ ($user->country ?? 'ES') == 'DE' ? 'selected' : '' }}>Germany</option>
                            <option value="FR" {{ ($user->country ?? 'ES') == 'FR' ? 'selected' : '' }}>France</option>
                        </select>
                    </div>
                    <div class="admin-panel__field">
                        <div class="admin-panel__field-label">Status</div>
                        <select name="status" class="admin-panel__field-info">
                            <option value="verified" {{ ($user->is_verified ?? true) ? 'selected' : '' }}>Verified</option>
                            <option value="unverified" {{ !($user->is_verified ?? true) ? 'selected' : '' }}>Unverified</option>
                            <option value="blocked">Blocked</option>
                        </select>
                    </div>
                    <div class="admin-panel__field">
                        <div class="admin-panel__field-label">Balance</div>
                        <input class="admin-panel__field-input" name="balance" type="number" step="0.01" value="{{ $user->balance ?? '50000' }}" />
                    </div>
                </div>
                <button type="submit" class="btn btn--md">Update Account</button>
            </form>
        </div>

        <!-- Bank Accounts Block -->
        <div class="admin-panel__block">
            <div class="admin-panel__title">Bank Accounts</div>
            <div class="admin-panel__grid">
                <select id="account-selector">
                    <option value="" selected>Select an account</option>
                    @forelse($accounts ?? [] as $account)
                    <option value="{{ $account['id'] }}" data-account="{{ json_encode($account) }}">
                        {{ $account['company'] }} - {{ $account['account_number'] }}
                    </option>
                    @empty
                    <option disabled>No accounts available</option>
                    @endforelse
                </select>
                <div class="admin-panel__field">
                    <div class="admin-panel__field-label">Account Name</div>
                    <input class="admin-panel__field-input" id="account-name" type="text" value="" placeholder="Select an account first" />
                </div>
            </div>
            <button type="button" class="btn btn--md" data-popup="#create-modal">
                Create New Account
                <span>
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5 12H19M12 5V19" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </span>
            </button>
        </div>

        <!-- Transactions Block -->
        <div class="admin-panel__block">
            <div class="admin-panel__title">Transactions</div>
            <div class="admin-panel__grid">
                <select data-search>
                    <option value="" selected>Select a transaction</option>
                    @forelse($transactions ?? [] as $transaction)
                    <option value="{{ $transaction['id'] }}">
                        {{ $transaction['date'] }} - {{ $transaction['amount'] }}€
                    </option>
                    @empty
                    <option disabled>No transactions available</option>
                    @endforelse
                </select>
            </div>
        </div>

        <!-- User Management Block -->
        <div class="admin-panel__block">
            <div class="admin-panel__title">User Management</div>
            <div class="admin-panel__grid">
                <div class="admin-panel__stats">
                    <div class="stat-item">
                        <div class="stat-label">Total Users</div>
                        <div class="stat-value">{{ $stats['total_users'] ?? '1,234' }}</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-label">Active Users</div>
                        <div class="stat-value">{{ $stats['active_users'] ?? '987' }}</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-label">Pending Verifications</div>
                        <div class="stat-value">{{ $stats['pending_verifications'] ?? '23' }}</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-label">Total Balance</div>
                        <div class="stat-value">{{ $stats['total_balance'] ?? '2,456,789' }}€</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Admin panel functionality
    document.addEventListener('DOMContentLoaded', function() {
        // Account selector functionality
        const accountSelector = document.getElementById('account-selector');
        const accountNameInput = document.getElementById('account-name');

        if (accountSelector && accountNameInput) {
            accountSelector.addEventListener('change', function() {
                if (this.value) {
                    const accountData = JSON.parse(this.options[this.selectedIndex].getAttribute('data-account'));
                    accountNameInput.value = accountData.company || '';
                } else {
                    accountNameInput.value = '';
                }
            });
        }

        // Save button functionality
        const saveButton = document.querySelector('.admin-panel__save');
        if (saveButton) {
            saveButton.addEventListener('click', function() {
                // Here you would typically save all the form data
                alert('Settings saved successfully!');
            });
        }

        // Switch toggle functionality
        const switchInput = document.querySelector('.switch__input');
        if (switchInput) {
            switchInput.addEventListener('change', function() {
                console.log('Admin mode:', this.checked ? 'enabled' : 'disabled');
            });
        }
    });
</script>
@endpush