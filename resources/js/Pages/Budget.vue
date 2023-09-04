<script>
import Results from '@/Pages/Results.vue';
import Errors from '@/Pages/Error.vue';
import { Head } from '@inertiajs/inertia-vue3';

export default {
    name: 'Budget',
    components: {
        Results,
        Errors,
        Head
    },
    data() {
        return {
            budget: {
                value: '',
                total: 0,
                vehicleType: "",
                fees: {
                    basic: 0,
                    special: 0,
                    association: 0,
                    storage: 0
                }
            },
            errors: ""
        }
    },
    methods: {
        calculate() {

            if (this.budget.value !== '') {
                axios.post(route('calculation'), {
                    budget: this.budget.value,
                    vehicleType: this.budget.vehicleType
                }).then((response) => {
                    this.budget.value = response.data.result.budget;
                    this.budget.vehicleType = response.data.result.vehicleType;
                    this.budget.total = response.data.result.total;
                    this.budget.fees.basic = response.data.result.fees.basic;
                    this.budget.fees.special = response.data.result.fees.special;
                    this.budget.fees.association = response.data.result.fees.association;
                    this.budget.fees.storage = response.data.result.fees.storage;

                    this.errors = "";
                })
                .catch(error => {
                    this.errors  = error.response.data.message;
                })
            }
        }
    }
}
</script>

<template>
    <Head title="The Bid Calculation" />
    <div class="bg-gray-100 min-h-screen flex justify-center items-center">
        <div class="block p-10 rounded-lg shadow-2xl  max-w-fit m-4">

            <h1 class="mb-4 flex justify-center font-bold mb-8">The Bid Calculation</h1>
            <div class="w-full max-w-xs mb-10">
                <form @submit.prevent="submit" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    <div class="mb-4">
                        <label for="vehicleType" class="block text-gray-700 text-sm font-bold mb-2">Vehicule Type</label>
                        <select  name="vehicleType" id="vehicleType" required
                            v-model="budget.vehicleType" autofocus class="block appearance-none w-full bg-white-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                            <option value="">Select Vehicule</option>
                            <option value="Common">Common</option>
                            <option value="Luxury">Luxury </option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="budget" class="block text-gray-700 text-sm font-bold mb-2">Vehicle Cost</label>
                        <input id="budget" type="budget" class="block appearance-none w-full bg-white-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            v-model="budget.value" required @keyup="calculate" />
                    </div>
                </form>
            </div>

           <Errors v-show="errors" :errors="errors"/>

            <Results :budget="budget" />
        </div>
    </div>
</template>
