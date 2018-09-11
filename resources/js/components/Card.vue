<template>
    <card class="flex flex-col">
        <div class="">
            <h1 class="p-4 text-lg font-semibold text-80 font-light">Blockchain Exchange Rates</h1>

            <ul class="list-reset">
                <li class="bg-30 p-1 border-b border-50" v-for="(item, index) in data">
                    <div class="flex items-center justify-between">
                        <div class="text-grey-darker m-2 font-semibold">
                            {{ index }}
                        </div>
                        <div class="text-grey-darker m-2">
                            <div class="text-xs text-right">
                                <svg class="fill-current text-success mr-1 inline-block h-3 w-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 20a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm-2-8V5h4v5h3l-5 5-5-5h3z"/></svg> BUY
                            </div>
                            <span class="text-md">{{ item.symbol }} {{ formatPrice(item.buy) }}</span>
                        </div>
                        <div class="text-grey-darker m-2">
                            <div class="text-xs text-right">
                                <svg class="fill-current text-danger  mr-1 inline-block h-3 w-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 0a10 10 0 1 1 0 20 10 10 0 0 1 0-20zm0 2a8 8 0 1 0 0 16 8 8 0 0 0 0-16zm2 8v5H8v-5H5l5-5 5 5h-3z"/></svg> SELL
                            </div>
                            <span class="text-md">{{ item.symbol }} {{ formatPrice(item.sell) }}</span>
                        </div>
                    </div>                    
                </li>
            </ul>

            <div class="p-3 text-xs text-80">
                Via <a href="https://blockchain.info/ticker">Blockchain.com</a>
            </div>
        </div>
    </card>
</template>

<script>
export default {
    props: ['card'],
    data: () => {
        return {
            data: [],
        };
    },
    mounted() {
        Nova.request().get('/nova-vendor/blockchain-exchange-rates/ticker').then(response => {
            this.data = response.data;
        });
    },
    methods: {
        formatPrice(value) {
            let val = (value/1).toFixed(2).replace('.', ',')
            return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
        }
    }
}
</script>