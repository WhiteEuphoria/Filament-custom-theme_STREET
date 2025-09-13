@extends('layouts.dashboard')

@section('title', 'Withdrawal')

@section('dashboard-content')
<div class="container">
    <div class="withdrawal">
        <div class="withdrawal__back">
            <button type="button" onclick="history.back()">
                <img src="{{ asset('img/icons/arrow.svg') }}" alt="back">
            </button>
        </div>
        
        <div class="withdrawal__block withdrawal__block--centered" data-withdraw-nav>
            <div class="withdrawal__title">Choose a withdrawal method</div>
            <div class="withdrawal__nav">
                <button type="button" class="withdrawal__btn active" data-target="card">
                    <span>Withdrawal to the card</span>
                    <svg width="41" height="40" viewBox="0 0 41 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <mask id="mask0_110_5752" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="2" y="4" width="37" height="32">
                            <path d="M12.1666 10.8335V7.50016C12.1666 7.05814 12.3422 6.63421 12.6548 6.32165C12.9673 6.00909 13.3913 5.8335 13.8333 5.8335H35.5C35.942 5.8335 36.3659 6.00909 36.6785 6.32165C36.991 6.63421 37.1666 7.05814 37.1666 7.50016V22.5002C37.1666 22.9422 36.991 23.3661 36.6785 23.6787C36.3659 23.9912 35.942 24.1668 35.5 24.1668H33.8333" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M27.1666 15.8335H5.49998C4.57951 15.8335 3.83331 16.5797 3.83331 17.5002V32.5002C3.83331 33.4206 4.57951 34.1668 5.49998 34.1668H27.1666C28.0871 34.1668 28.8333 33.4206 28.8333 32.5002V17.5002C28.8333 16.5797 28.0871 15.8335 27.1666 15.8335Z" fill="white" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M3.83331 23.3335H28.8333" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M28.8333 19.167V29.167M3.83331 19.167V29.167" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M9.66663 28.3335H16.3333M21.3333 28.3335H23" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </mask>
                        <g mask="url(#mask0_110_5752)">
                            <path d="M0.5 0H40.5V40H0.5V0Z" fill="currentColor" />
                        </g>
                    </svg>
                </button>
                <button type="button" class="withdrawal__btn" data-target="iban">
                    <span>Withdrawal by IBAN</span>
                    <svg width="41" height="40" viewBox="0 0 41 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M25.5 25.0002V20.0002H30.5V16.6668L37.1666 22.5002L30.5 28.3335V25.0002H25.5ZM23.8333 14.5002V16.6668H3.83331V14.5002L13.8333 8.3335L23.8333 14.5002ZM3.83331 28.3335H23.8333V31.6668H3.83331V28.3335ZM12.1666 18.3335H15.5V26.6668H12.1666V18.3335ZM5.49998 18.3335H8.83331V26.6668H5.49998V18.3335ZM18.8333 18.3335H22.1666V26.6668H18.8333V18.3335Z" fill="currentColor" />
                    </svg>
                </button>
                <button type="button" class="withdrawal__btn" data-target="crypto">
                    <span>Withdrawal to crypto</span>
                    <svg width="41" height="40" viewBox="0 0 41 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M31.75 6.25H28.3617C27.8424 6.25036 27.3394 6.4314 26.939 6.76205C26.5386 7.09271 26.2658 7.55238 26.1672 8.06223C26.0687 8.57208 26.1506 9.10032 26.399 9.55637C26.6473 10.0124 27.0466 10.3678 27.5284 10.5617L30.9684 11.9383C31.4501 12.1322 31.8494 12.4876 32.0978 12.9436C32.3461 13.3997 32.428 13.9279 32.3295 14.4378C32.231 14.9476 31.9581 15.4073 31.5577 15.7379C31.1573 16.0686 30.6543 16.2496 30.135 16.25H29.25M29.25 6.25V5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M30.55 21.1667C32.4004 20.9237 34.1459 20.1677 35.589 18.9844C37.0322 17.8011 38.1155 16.2376 38.7165 14.4708C39.3174 12.7039 39.412 10.8041 38.9896 8.9863C38.5672 7.16847 37.6445 5.50509 36.326 4.18426C35.0076 2.86343 33.3458 1.93785 31.5288 1.51217C29.7117 1.0865 27.8118 1.17772 26.0438 1.77552C24.2759 2.37331 22.7105 3.45384 21.5246 4.8949C20.3387 6.33597 19.5797 8.08009 19.3334 9.93003M26.75 26.25C26.75 22.9348 25.4331 19.7554 23.0889 17.4112C20.7446 15.067 17.5652 13.75 14.25 13.75M4.25002 18.75C3.23676 20.1147 2.51246 21.6717 2.12141 23.3258C1.73035 24.9799 1.68074 26.6964 1.97563 28.3703C2.27051 30.0443 2.90368 31.6405 3.83644 33.0614C4.7692 34.4823 5.98195 35.6981 7.40054 36.6343C8.81914 37.5706 10.4138 38.2077 12.087 38.5068C13.7602 38.8058 15.4768 38.7604 17.1319 38.3735C18.7869 37.9865 20.3457 37.2661 21.7129 36.2562C23.0801 35.2463 24.2269 33.9682 25.0834 32.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M15.5 26.25C16.163 26.25 16.7989 25.9866 17.2678 25.5178C17.7366 25.0489 18 24.413 18 23.75C18 23.087 17.7366 22.4511 17.2678 21.9822C16.7989 21.5134 16.163 21.25 15.5 21.25H11.75V31.25H15.5C16.163 31.25 16.7989 30.9866 17.2678 30.5178C17.7366 30.0489 18 29.413 18 28.75C18 28.087 17.7366 27.4511 17.2678 26.9822C16.7989 26.5134 16.163 26.25 15.5 26.25ZM15.5 26.25H11.75M14.25 21.25V18.75M14.25 31.25V33.75M1.75 7.5L5.5 13.75L11.75 10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M14.1483 1.5C11.8341 2.3433 9.8606 3.92279 8.53074 5.99601C7.20088 8.06923 6.58817 10.5216 6.78666 12.9767M39.25 32.5L35.5 26.25L29.25 30" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M26.8517 38.5002C29.1653 37.657 31.1384 36.0781 32.4682 34.0055C33.798 31.933 34.4111 29.4814 34.2134 27.0269" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Card Withdrawal Form -->
        <div class="withdrawal__block" data-withdraw-card>
            <div class="withdrawal__title">Please complete the information below</div>
            <form action="{{ route('withdraw.card') }}" method="POST">
                @csrf
                <div class="field">
                    <input type="text" name="card_number" placeholder="1111 2222 3333 4444" required>
                    <span class="error-message"></span>
                </div>
                <div class="field">
                    <input type="text" name="cardholder_name" placeholder="Fullname card holder" required>
                    <span class="error-message"></span>
                </div>
                <div class="field">
                    <input type="number" name="amount" placeholder="Amount" step="0.01" min="1" required>
                    <span class="error-message"></span>
                </div>
                <button type="submit" class="btn btn--md">Withdrawal</button>
            </form>
        </div>

        <!-- IBAN Withdrawal Form -->
        <div class="withdrawal__block" data-withdraw-iban>
            <div class="withdrawal__title">Please complete the information below</div>
            <form action="{{ route('withdraw.iban') }}" method="POST">
                @csrf
                <div class="field">
                    <input type="text" name="iban" placeholder="Enter IBAN" required>
                    <span class="error-message"></span>
                </div>
                <div class="field">
                    <input type="text" name="bic_code" placeholder="BIC code" required>
                    <span class="error-message"></span>
                </div>
                <div class="field">
                    <input type="text" name="account_holder_name" placeholder="Fullname bank account holder" required>
                    <span class="error-message"></span>
                </div>
                <div class="field">
                    <select name="country" required>
                        <option value="" selected>Country</option>
                        <option value="US">United States</option>
                        <option value="GB">United Kingdom</option>
                        <option value="DE">Germany</option>
                        <option value="FR">France</option>
                        <option value="ES">Spain</option>
                        <option value="IT">Italy</option>
                        <option value="CA">Canada</option>
                        <option value="AU">Australia</option>
                    </select>
                    <span class="error-message"></span>
                </div>
                <div class="field">
                    <input type="number" name="amount" placeholder="Amount" step="0.01" min="1" required>
                    <span class="error-message"></span>
                </div>
                <button type="submit" class="btn btn--md">Withdrawal</button>
            </form>
        </div>

        <!-- Crypto Withdrawal Form -->
        <div class="withdrawal__block" data-withdraw-crypto>
            <div class="withdrawal__title">Please complete the information below</div>
            <form action="{{ route('withdraw.crypto') }}" method="POST">
                @csrf
                <div class="field">
                    <select name="cryptocurrency" required>
                        <option value="" selected>Choose cryptocurrency</option>
                        <option value="BTC">Bitcoin (BTC)</option>
                        <option value="ETH">Ethereum (ETH)</option>
                        <option value="LTC">Litecoin (LTC)</option>
                        <option value="BCH">Bitcoin Cash (BCH)</option>
                        <option value="XRP">Ripple (XRP)</option>
                    </select>
                    <span class="error-message"></span>
                </div>
                <div class="field">
                    <input type="text" name="wallet_address" placeholder="Wallet address" required>
                    <span class="error-message"></span>
                </div>
                <div class="field">
                    <input type="number" name="amount" placeholder="Amount" step="0.01" min="1" required>
                    <span class="error-message"></span>
                </div>
                <button type="submit" class="btn btn--md">Withdrawal</button>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Withdrawal method switching
    document.addEventListener('DOMContentLoaded', function() {
        const navButtons = document.querySelectorAll('[data-target]');
        const withdrawalBlocks = document.querySelectorAll('[data-withdraw-card], [data-withdraw-iban], [data-withdraw-crypto]');
        
        navButtons.forEach(button => {
            button.addEventListener('click', function() {
                const target = this.getAttribute('data-target');
                
                // Remove active class from all buttons
                navButtons.forEach(btn => btn.classList.remove('active'));
                
                // Add active class to clicked button
                this.classList.add('active');
                
                // Hide all withdrawal blocks
                withdrawalBlocks.forEach(block => block.style.display = 'none');
                
                // Show target block
                const targetBlock = document.querySelector(`[data-withdraw-${target}]`);
                if (targetBlock) {
                    targetBlock.style.display = 'block';
                }
            });
        });

        // Initialize - show card form by default
        document.querySelector('[data-withdraw-card]').style.display = 'block';
        document.querySelector('[data-withdraw-iban]').style.display = 'none';
        document.querySelector('[data-withdraw-crypto]').style.display = 'none';

        // Form validation
        const forms = document.querySelectorAll('form');
        forms.forEach(form => {
            form.addEventListener('submit', function(e) {
                const inputs = this.querySelectorAll('input[required], select[required]');
                let isValid = true;

                inputs.forEach(input => {
                    const errorMessage = input.parentElement.querySelector('.error-message');
                    
                    if (!input.value.trim()) {
                        input.parentElement.classList.add('has-error');
                        errorMessage.textContent = 'This field is required';
                        isValid = false;
                    } else {
                        input.parentElement.classList.remove('has-error');
                        errorMessage.textContent = '';
                    }
                });

                if (!isValid) {
                    e.preventDefault();
                }
            });
        });
    });
</script>
@endpush