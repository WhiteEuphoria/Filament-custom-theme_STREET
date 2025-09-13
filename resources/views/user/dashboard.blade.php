@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('dashboard-content')
<div class="container">
    <div class="grid">
        <div class="mobile-nav-tabs">
            <button type="button" class="active" data-tab="main">
                <span>Brokers</span>
                <span>
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11.8267 5.85585C11.4438 5.91737 9.27407 6.28103 9.13728 6.28103C8.99996 6.28103 8.99996 6.28103 8.99996 6.28103C8.99996 6.28103 8.99996 6.28103 8.86264 6.28103C8.72532 6.28103 6.55607 5.91737 6.17318 5.85585C5.51509 5.74929 4.96578 5.93551 4.77351 6.01514C3.96601 6.35022 4.23738 7.13357 4.41646 7.42361C4.66421 7.82242 5.60408 8.86941 6.53023 8.99189C7.73764 9.15066 8.78023 8.24756 8.99996 8.24756C9.21912 8.24756 10.2623 9.15066 11.4697 8.99189C12.3958 8.86941 13.3363 7.82238 13.5835 7.42361C13.7625 7.13357 14.0339 6.35025 13.2264 6.01514C13.0336 5.93548 12.4848 5.74926 11.8267 5.85585ZM6.49177 7.76909C6.10175 7.39172 6.16658 7.01267 6.62143 6.9819C7.07737 6.95005 7.84532 7.14011 7.85794 7.39168C7.89036 8.02123 6.88179 8.14758 6.49177 7.76909ZM11.5081 7.76909C11.1176 8.14758 10.109 8.02123 10.142 7.39172C10.1546 7.14014 10.9226 6.95005 11.3774 6.98194C11.8333 7.0127 11.8982 7.39172 11.5081 7.76909Z" fill="currentColor" />
                        <path d="M14.1592 4.07482C14.1592 3.89795 13.9757 3.54417 13.6467 3.47277C13.1715 0.673453 10.426 0 9 0C7.57396 0 4.8285 0.673453 4.3528 3.47277C4.02321 3.54417 3.84082 3.89795 3.84082 4.07482C3.84082 4.25225 3.84082 5.24377 3.84082 5.24377H14.1592C14.1592 5.24377 14.1592 4.25225 14.1592 4.07482Z" fill="currentColor" />
                        <path d="M12.5409 13.4377C12.5409 12.7274 12.3201 11.9507 11.6186 11.9507H6.38083C5.67989 11.9507 5.45854 12.7274 5.45854 13.4377C5.45854 13.6063 2.17639 14.4512 2.17639 16.3436C2.17639 16.7836 3.24592 17.9997 8.96264 17.9997H9.03678C14.7541 17.9997 15.8236 16.7835 15.8236 16.3436C15.8236 14.4512 12.5409 13.6063 12.5409 13.4377Z" fill="currentColor" />
                    </svg>
                </span>
            </button>
            <button type="button" data-tab="aside">
                <span>Transactions</span>
                <span>
                    <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.4091 5.65924C4.4091 3.9926 5.7652 2.6365 7.43184 2.6365H13.2438C13.0344 1.90404 12.3669 1.36377 11.5682 1.36377H4.25001C3.28464 1.36377 2.5 2.14841 2.5 3.11378V12.9775C2.5 13.9428 3.28464 14.7275 4.25001 14.7275H4.4091V5.65924Z" fill="currentColor" />
                        <path d="M14.75 3.90918H7.43183C6.46646 3.90918 5.68182 4.69382 5.68182 5.65919V14.8865C5.68182 15.8519 6.46646 16.6365 7.43183 16.6365H14.75C15.7154 16.6365 16.5001 15.8519 16.5001 14.8865V5.65919C16.5001 4.69382 15.7154 3.90918 14.75 3.90918ZM13.4773 14.7274H8.70456C8.44111 14.7274 8.22729 14.5136 8.22729 14.2501C8.22729 13.9867 8.44111 13.7729 8.70456 13.7729H13.4773C13.7408 13.7729 13.9546 13.9867 13.9546 14.2501C13.9546 14.5136 13.7408 14.7274 13.4773 14.7274ZM13.4773 12.1819H8.70456C8.44111 12.1819 8.22729 11.9681 8.22729 11.7047C8.22729 11.4412 8.44111 11.2274 8.70456 11.2274H13.4773C13.7408 11.2274 13.9546 11.4412 13.9546 11.7047C13.9546 11.9681 13.7408 12.1819 13.4773 12.1819ZM13.4773 9.95466H8.70456C8.44111 9.95466 8.22729 9.74084 8.22729 9.47738C8.22729 9.21393 8.44111 9.00011 8.70456 9.00011H13.4773C13.7408 9.00011 13.9546 9.21393 13.9546 9.47738C13.9546 9.74084 13.7408 9.95466 13.4773 9.95466ZM13.4773 7.40919H8.70456C8.44111 7.40919 8.22729 7.19537 8.22729 6.93192C8.22729 6.66846 8.44111 6.45464 8.70456 6.45464H13.4773C13.7408 6.45464 13.9546 6.66846 13.9546 6.93192C13.9546 7.19537 13.7408 7.40919 13.4773 7.40919Z" fill="currentColor" />
                    </svg>
                </span>
            </button>
        </div>

        <div class="main active">
            <div class="user-info" data-da=".grid,1023.98,first">
                <div class="user-info__col">
                    <div class="user-info__title">Welcome {{ $user->first_name ?? 'I. V.' }} {{ $user->last_name ?? 'Client' }}</div>
                    <div class="user-info__text">{{ $user->country ?? 'Spain' }}, {{ $user->date_of_birth ? date('m.d.Y', strtotime($user->date_of_birth)) : '04.21.1997' }}</div>
                    <div class="user-info__status user-info__status--verify">{{ $user->is_verified ? 'Verified' : 'Unverified' }}</div>
                </div>
                <div class="user-info__col">
                    <div class="user-info__title" style="font-weight: 600;">
                        Balance <img src="{{ asset('img/icons/wallet.svg') }}" alt="wallet">
                    </div>
                    <div class="user-info__text-lg">{{ $user->balance ?? '50 000' }} €</div>
                </div>
            </div>

            <div class="user-table">
                <table>
                    <thead>
                        <tr>
                            <th>Company <br> Broker</th>
                            <th>Bank <br> Account No.</th>
                            <th>Owner</th>
                            <th>Type</th>
                            <th class="desktop">Expiry date</th>
                            <th>
                                <span class="desktop">Balance</span>
                                <span class="mobile">Expiry date <br> Balance</span>
                            </th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($accounts ?? collect([
                            [
                                'company' => 'EzInvest',
                                'broker' => 'I.V. Broker',
                                'bank' => 'Alfa bank',
                                'account_number' => '4123 ... 3423',
                                'owner' => 'I.V. Client',
                                'type' => 'Classic',
                                'expiry_date' => '03/11/26',
                                'balance' => '17 000',
                                'status' => 'HOLD'
                            ],
                            [
                                'company' => 'TradeFx',
                                'broker' => 'J.D. Broker', 
                                'bank' => 'Beta bank',
                                'account_number' => '5234 ... 4567',
                                'owner' => 'I.V. Client',
                                'type' => 'Premium',
                                'expiry_date' => '05/12/26',
                                'balance' => '23 000',
                                'status' => 'ACTIVE'
                            ],
                            [
                                'company' => 'InvestPro',
                                'broker' => 'K.L. Broker',
                                'bank' => 'Gamma bank', 
                                'account_number' => '6345 ... 5678',
                                'owner' => 'I.V. Client',
                                'type' => 'Standard',
                                'expiry_date' => '02/08/26',
                                'balance' => '10 000',
                                'status' => 'HOLD'
                            ]
                        ]) as $account)
                        <tr>
                            <td>
                                <div class="user-table__td">
                                    {{ $account['company'] ?? 'EzInvest' }}
                                    <span>{{ $account['broker'] ?? 'I.V. Broker' }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="user-table__td">
                                    {{ $account['bank'] ?? 'Alfa bank' }}
                                    <span>{{ $account['account_number'] ?? '4123 ... 3423' }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="user-table__td">
                                    <span>{{ $account['owner'] ?? 'I.V. Client' }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="user-table__td">
                                    <span>{{ $account['type'] ?? 'Classic' }}</span>
                                </div>
                            </td>
                            <td class="desktop">
                                <div class="user-table__td">
                                    <b>{{ $account['expiry_date'] ?? '03/11/26' }}</b>
                                </div>
                            </td>
                            <td>
                                <div class="user-table__td">
                                    <span class="mobile"><b>{{ $account['expiry_date'] ?? '03/11/26' }}</b></span>
                                    <b>{{ $account['balance'] ?? '17 000' }} €</b>
                                </div>
                            </td>
                            <td>
                                <div class="user-table__status user-table__status--{{ strtolower($account['status'] ?? 'hold') }}">
                                    {{ $account['status'] ?? 'HOLD' }}
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">No accounts found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="aside">
            <div class="transaction desktop">
                <div class="transaction-title">
                    Transactions <img src="{{ asset('img/icons/copy.svg') }}" alt="transactions">
                </div>
                <div class="transaction-list">
                    @forelse($transactions ?? collect([
                        [
                            'title' => 'Transactions',
                            'date' => '29/03/25',
                            'time' => '03:13:25',
                            'from' => '1234 ... 3231',
                            'to' => '1Fssj...qwet2',
                            'amount' => '1500',
                            'status' => 'success'
                        ],
                        [
                            'title' => 'Transactions', 
                            'date' => '28/03/25',
                            'time' => '15:22:10',
                            'from' => '5678 ... 9012',
                            'to' => '2Gaab...erty3',
                            'amount' => '750',
                            'status' => 'block'
                        ],
                        [
                            'title' => 'Transactions',
                            'date' => '27/03/25', 
                            'time' => '09:45:33',
                            'from' => '3456 ... 7890',
                            'to' => '3Hccd...zuio4',
                            'amount' => '2200',
                            'status' => 'wait'
                        ]
                    ]) as $transaction)
                    <div class="transaction-item transaction-item--{{ $transaction['status'] ?? 'wait' }}">
                        <div class="transaction-item__top">
                            <div class="transaction-item__title">{{ $transaction['title'] ?? 'Transaction' }}</div>
                            <div class="transaction-item__date">
                                <span>{{ $transaction['date'] ?? '29/03/25' }}</span>
                                <span>{{ $transaction['time'] ?? '03:13:25' }}</span>
                            </div>
                        </div>
                        <div class="transaction-item__bottom">
                            <div class="transaction-item__block">
                                <div class="transaction-item__num">{{ $transaction['from'] ?? '1234 ... 3231' }}</div>
                                <span><img src="{{ asset('img/icons/arrow.svg') }}" alt="arrow"></span>
                                <div class="transaction-item__text-md">{{ $transaction['to'] ?? '1Fssj...qwet2' }}</div>
                            </div>
                            <div class="transaction-item__sum">{{ $transaction['amount'] ?? '1500' }} €</div>
                        </div>
                    </div>
                    @empty
                    <div class="transaction-item">
                        <div class="text-center">No transactions found</div>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Tab switching functionality
    document.addEventListener('DOMContentLoaded', function() {
        const tabButtons = document.querySelectorAll('[data-tab]');
        const main = document.querySelector('.main');
        const aside = document.querySelector('.aside');

        tabButtons.forEach(button => {
            button.addEventListener('click', function() {
                const tabName = this.getAttribute('data-tab');
                
                // Remove active class from all buttons
                tabButtons.forEach(btn => btn.classList.remove('active'));
                
                // Add active class to clicked button
                this.classList.add('active');
                
                // Show/hide content
                if (tabName === 'main') {
                    main.classList.add('active');
                    aside.classList.remove('active');
                } else if (tabName === 'aside') {
                    main.classList.remove('active');
                    aside.classList.add('active');
                }
            });
        });
    });
</script>
@endpush