<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, usePage } from '@inertiajs/vue3';
import {computed} from "vue";


const page = usePage()
const user = computed(() => page.props.auth.user)
const user_coins = computed(() => page.props.user_coins)
const total_balance = computed(() => page.props.total_balance)
const total_pending_balance = computed(() => page.props.pending_balance)
const referral_link = computed(() => page.props.referral_link)


//method to copy the referral link to the clipboard
const copyReferralLink = () => {
    const textArea = document.createElement("textarea");
    textArea.value = referral_link.value;
    document.body.appendChild(textArea);
    textArea.select();
    document.execCommand("copy");
    document.body.removeChild(textArea);
    alert('Referral link copied to clipboard');
};


</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>

        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-card-five">
                <div class="widget-content">
                    <div class="account-box">

                        <div class="info-box">
                            <div class="icon">
                                <span>
                                    <img src="../../src/assets/img/money-bag.png" alt="money-bag">
                                </span>
                            </div>

                            <div class="balance-info">
                                <h6>Total Balance</h6>
                                <p>R{{total_balance}}.00</p>
                            </div>
                        </div>

                        <div class="card-bottom-section">
                            <a onclick="alert('coming sooon')" class="">View Transactions</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-card-five">
                <div class="widget-content">
                    <div class="account-box">

                        <div class="info-box">
                            <div class="icon">
                                <span>
                                    <img src="../../src/assets/img/money-bag.png" alt="money-bag">
                                </span>
                            </div>

                            <div class="balance-info">
                                <h6>Total Pending Balance</h6>
                                <p>R{{total_pending_balance}}.00</p>
                            </div>
                        </div>

                        <div class="card-bottom-section">
                            <a onclick="alert('coming sooon')" class="">View to confirm transactions</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 layout-spacing">
            <div class="widget widget-one_hybrid widget-referral">
                <div class="widget-heading">
                    <div class="w-title">
                        <div class="w-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-link"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path></svg>
                        </div>
                        <div class="">
                            <p class="w-value">{{user.referral.use_count}}</p>
                            <h5 class="">Referrals</h5>
                        </div>
                    </div>

                    <div class="widget-content" style="font-size:12px;margin-left:16px;">
                        <div class="w-content">
                            <p class="mb-0">Referral Link: <b style="color:#2196f3;cursor:pointer;" v-on:click="copyReferralLink">{{referral_link}}</b></p>
                            <p class="mt-3.5 text-success">After 5 people have used your referral code you will receive a coin.</p>
                            <span class="badge badge-primary mb-2 mt-2" v-on:click="copyReferralLink">Copy</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget-four">
                <div class="widget-heading">
                    <h5 class="">My Coins</h5>
                </div>

                <h6 v-if="user_coins.length === 0" class="text-center mt-56 text-danger">You have not bought any coins yet</h6>
                <div class="row">
                  <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-4" v-for="user_coin in user_coins" :key="user_coin.id">
                      <a class="card style-6 coin-card" data-bs-toggle="modal" :data-bs-target="`#coinModal_${user_coin.id}`">
                          <span class="badge badge-primary">YOURS</span>
                          <img src="../../src/assets/img/solana_coin.jpeg" class="card-img-top" alt="...">
                          <div class="card-footer">
                              <div class="row">
                                  <div class="col-12 mb-4">
                                      <b>{{user_coin.coin_name}}</b>
                                      <p class="ownedBy">Owned by: {{user.name}}</p>
                                  </div>
                                  <div class="col-3">
                                      <div class="badge--group">
                                          <div class="badge badge-primary badge-dot"></div>
                                          <div class="badge badge-danger badge-dot"></div>
                                          <div class="badge badge-info badge-dot"></div>
                                      </div>
                                  </div>
                                  <div class="col-9 text-end">
                                      <div class="pricing d-flex justify-content-end">
                                          <p class="text-success mb-0">R{{user_coin.coin_value}}.00</p>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </a>
                  </div>
                </div>
            </div>
        </div>



    </AuthenticatedLayout>
</template>
