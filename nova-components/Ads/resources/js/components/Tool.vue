<template>
    <loading-view :loading="getting_key">
        <form autocomplete="off">
            <div class="mb-8">
                <h1 class="mb-3 text-90 font-normal text-2xl">Update Payment Details</h1>
                <div class="card">
                    <div class="flex border-b border-40" resource-id="1" via-resource="" via-resource-id=""
                        via-relationship="">
                        <div class="w-1/5 px-8 py-6"><label for="username"
                                class="inline-block text-80 pt-2 leading-tight">
                                Cardholder

                                <span class="text-danger text-sm">*</span></label></div>
                        <div class="py-6 px-8 w-1/2">
                            <input v-model="card_holder" id="cardholder" dusk="cardholder" type="text" placeholder="Cardholder"
                                class="w-full form-control form-input form-input-bordered">

                            <div class="help-text help-text mt-2">

                            </div>
                        </div>
                    </div>

                    <div class="flex border-b border-40" resource-id="1" via-resource="" via-resource-id=""
                        via-relationship="">
                        <div class="w-1/5 px-8 py-6"><label for="username"
                                class="inline-block text-80 pt-2 leading-tight">
                                Card Number

                                <span class="text-danger text-sm">*</span></label></div>
                        <div class="py-6 px-8 w-1/2" >
                            <div class="w-full form-control form-input form-input-bordered" ref="cardNumber">

                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="flex items-center">
                <a tabindex="0" class="btn btn-link dim cursor-pointer text-80 ml-auto mr-6">
                    Cancel
                </a> 
                <button @click="HandleStripe" type="button" id="update-button" class="btn btn-default btn-primary inline-flex items-center relative mr-3"
                    dusk="update-and-continue-editing-button">
                    <loader v-if="stripe_loading"></loader>
                    <span class="" v-else>
                        Update &amp; Continue Editing
                    </span>
                    
                </button> 
                <!-- <button type="submit" class="btn btn-default btn-primary inline-flex items-center relative"
                    dusk="update-button"><span class="">
                        Update User
                    </span>
                </button> -->
                </div>
        </form>
    </loading-view>
</template>

<script>
export default {
    data () {
        return {
            getting_key: true,
            stripe_key: null,
            stripe_secret: null,
            stripe_loading: false,
            stripe: null,
            card_element: null,
            card_holder: null,
        }
    },
    methods: {
        GetKeys() {
            Nova.request().get('/nova-vendor/ads/stripe/key')
                .then((response) => {
                    this.stripe_key = response.data;
                    return Nova.request().get('/nova-vendor/ads/stripe/secret')
                })
                .then((response) => {
                    this.stripe_secret = response.data;
                    this.getting_key = false;
                    setTimeout(() => {
                        this.SetupStripe();
                    }, 1000)
                })
        },

        StripeStyle() {
            return {
                base: {
                    'lineHeight': '1.35',
                    'fontSize': '1.11rem',
                    'color': '#7c858e',
                    'fontFamily': 'apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif'
                }
            }
        },

        SetupStripe() {
            this.stripe = Stripe(this.stripe_key);
            const elements = this.stripe.elements();

            this.card_element = elements.create('card', {
                // placeholder: '**** **** **** ****',
                style: this.StripeStyle()
            })
            this.card_element.mount(this.$refs.cardNumber);
        },
        
        async HandleStripe () {
            if (this.stripe_loading) return;
            if (!this.card_holder || this.card_holder.trim().length <= 0) {
                return Nova.error('Card holder field required');
            }
            this.stripe_loading = true;
            const { setupIntent, error } = await this.stripe.handleCardSetup(this.stripe_secret, this.card_element, {
                payment_method_data: {
                    billing_details: {
                        name: this.card_holder
                    }
                }
            })

            if (error) {
                return this.StripeError(error)
            } else {
                return this.StripeSuccess(setupIntent)
            }
        },

        StripeSuccess(data) {
            
            Nova.request().post('/nova-vendor/ads/stripe/payment_method', {
                payment_method: data.payment_method
            })
            .then(response => {
                Nova.success('Payment Updated')
                this.stripe_loading = false;
            })
            .catch(this.StripeError)
        },

        StripeError(error) {
            Nova.error(error.message)
            this.stripe_loading = false;
        },


        
    },
    mounted() {
        this.GetKeys()
    },

    // mounted() {
    //     this.$nextTick().then(this.SetupStripe)
    // }
}
</script>

<style>
/* Scoped Styles */
</style>
