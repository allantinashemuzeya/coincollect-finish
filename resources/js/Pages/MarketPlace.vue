<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, useForm, usePage} from '@inertiajs/vue3';
import {computed} from "vue";
import 'mousetrap';


const page = usePage()
const user = computed(() => page.props.auth.user)
const market_coins = computed(() => page.props.market_coins)

const form = useForm({
    purchaser_uid: user.id,
    coin_id:0,
    pop: null,
    payment_method: 'EFT'
});

const handleFileChange = (event) => {
   form.pop = event.target.files[0];
}

const submit = (coin_id) => {
    form.coin_id = coin_id;
    form.post(route('confirm-purchase'), {
        onFinish: () => form.reset(),
    });
};

</script>

<style scoped>

@import "resources/src/assets/css/dark/elements/alert.css";

    .ownedBy{
        color: #b2b2b2;
        font-size: 12px;
        top: 13px;
        position: relative;
    }
    .coin-name-modal{
        font-size: 1.5em;
    }
    .coin-card {
        cursor: pointer;
    }

</style>

<template>
    <Head title="Market Place" />

    <AuthenticatedLayout>

        <div class="row">
            <div class="col-xxl-2 col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-4" v-for="market_coin in market_coins" :key="market_coin.id">
                <a class="card style-6 coin-card" data-bs-toggle="modal" :data-bs-target="`#coinModal_${market_coin.id}`">
                    <span class="badge badge-primary">NEW</span>
                    <img src="../../src/assets/img/solana_coin.jpeg" class="card-img-top" alt="...">
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-12 mb-4">
                                <b>{{market_coin.coin_name}}</b>
                                <p class="ownedBy">Owned by: {{market_coin.user.name}}</p>
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
                                    <p class="text-success mb-0">R{{market_coin.coin_value}}.00</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <div class="modal fade" :id="`coinModal_${market_coin.id}`" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="card style-4">
                                <div class="card-body pt-3">
                                    <div class="media mt-0 mb-3">
                                        <div class="">
                                            <div class="avatar avatar-md avatar-indicators avatar-online me-3">
                                                <img alt="avatar" src="../../src/assets/img/solana_coin.jpeg" class="rounded-circle">
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <b class="text-white coin-name-modal">{{market_coin.coin_name}}</b>
                                            <h4 class="media-heading mb-0">{{market_coin.user.name}}</h4>
                                            <p class="media-text">Trader</p>
                                        </div>
                                    </div>
                                    <p class="card-text mt-4 mb-0">
<!--                                        nicely show the bank details -->
                                        <b>Bank Details</b>
                                        <br>
                                        <b>Bank Name:</b> {{market_coin.client.bank_name}}
                                        <br>
                                        <b>Account Number:</b> {{market_coin.client.account_number}}
                                        <br>
                                        <b>Account Type:</b> {{market_coin.client.account_type}}
                                        <br>
                                        <b>Phone Number:</b> {{market_coin.client.phone_number}}
                                        <br>

                                    </p>
                                </div>
                                <div class="card-footer pt-0 border-0 text-center">
                                    <div class="alert alert-light-warning fade show border-0 mb-4" role="alert">
                                        Clicking the confirm coin purchase button confirms that you have sent money to the seller of this coin.
                                        Please make sure that you have sent the money to the seller before clicking the confirm coin purchase button.
                                    </div>

                                    <form @submit.prevent="submit(market_coin.id)">
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">Proof of Payment</label>
                                            <input class="form-control" type="file" id="formFile" required v-on:change="handleFileChange">
                                        </div>
                                      <div class="mb-3">
                                        <label for="formFile" class="form-label">I have paid using </label>
                                        <select class="form-select" v-model="form.payment_method" aria-label="Default select example">
                                          <option selected >Open this select menu</option>
                                          <option value="eft">EFT</option>
                                          <option value="cash">Cash</option>
                                          <option value="ewallet">Card</option>
                                        </select>
                                      </div>
                                    <button type="submit" class="btn btn-secondary w-100">
                                        <svg viewBox="0 0 24 24" enable-background="new 0 0 24 24" version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="Home"></g> <g id="Print"></g> <g id="Mail"></g> <g id="Camera"></g> <g id="Video"></g> <g id="Film"></g> <g id="Message"></g> <g id="Telephone"></g> <g id="User"></g> <g id="File"></g> <g id="Folder"></g> <g id="Map"></g> <g id="Download"></g> <g id="Upload"></g> <g id="Video_Recorder"></g> <g id="Schedule"></g> <g id="Cart"></g> <g id="Setting"></g> <g id="Search"></g> <g id="Pencils"></g> <g id="Group"></g> <g id="Record"></g> <g id="Headphone"></g> <g id="Music_Player"></g> <g id="Sound_On"></g> <g id="Sound_Off"></g> <g id="Lock"></g> <g id="Lock_open"></g> <g id="Love"></g> <g id="Favorite"></g> <g id="Film_1_"></g> <g id="Music"></g> <g id="Puzzle"></g> <g id="Turn_Off"></g> <g id="Book"></g> <g id="Save"></g> <g id="Reload"></g> <g id="Trash"></g> <g id="Tag"></g> <g id="Link"></g> <g id="Like"></g> <g id="Bad"></g> <g id="Gallery"></g> <g id="Add"></g> <g id="Close"></g> <g id="Forward"></g> <g id="Back"></g> <g id="Buy"> <path d="M28,9h-3V8c0-3.9-3.1-7-7-7h-2h-2c-3.9,0-7,3.1-7,7v1H4c-1.7,0-3,1.3-3,3v16c0,1.6,1.3,3,3,3h12h12 c1.7,0,3-1.4,3-3V12C31,10.3,29.7,9,28,9z M23,9h-7H9V8c0-2.8,2.2-5,5-5h2h2c2.8,0,5,2.2,5,5V9z" fill="#FFC10A"></path> <path d="M18,1h-2h-2c-3.9,0-7,3.1-7,7v8c0,0.5,0.5,1,1,1s1-0.5,1-1V8c0-2.8,2.2-5,5-5h2h2c2.8,0,5,2.2,5,5v8 c0,0.5,0.5,1,1,1s1-0.5,1-1V8C25,4.1,21.9,1,18,1z" fill="#673AB7"></path> </g> <g id="Mac"></g> <g id="Laptop"></g> </g></svg>
                                        <span class="btn-text-inner ms-3">Confirm Coin Purchase</span></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>



        <!-- Modal -->

    </AuthenticatedLayout>
</template>
