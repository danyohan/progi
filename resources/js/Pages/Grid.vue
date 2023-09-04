<template>
  <table class="border-collapse border-spacing-2 border-slate-400 ">
  <thead>
  <tr>
      <th scope="col" class="px-6 py-4 border border-slate-300" rowspan="2">Vehicle Price ($)</th>
      <th scope="col" class="px-6 py-4 border border-slate-300" colspan="4">Fees</th>
      <th scope="col" class="px-6 py-4 border border-slate-300" rowspan="2">Total</th>
  </tr>
  <tr>
      <th class="px-6 py-4 border border-slate-300">Basic</th>
      <th class="px-6 py-4 border border-slate-300">Special</th>
      <th class="px-6 py-4 border border-slate-300">Association</th>
      <th class="px-6 py-4 border border-slate-300">Storage</th>
  </tr>
  </thead>
  <tbody>
  <tr>
      <td class="text-center border border-slate-300">{{budget.value}}</td>
      <td class="text-center border border-slate-300">{{budget.fees.basic}}</td>
      <td class="text-center border border-slate-300">{{budget.fees.special}}</td>
      <td class="text-center border border-slate-300">{{budget.fees.association}}</td>
      <td class="text-center border border-slate-300">{{budget.fees.storage}}</td>
      <td class="text-center border border-slate-300">{{budget.total}}</td>
  </tr>
  </tbody>
  </table>
</template>
<script>

export default {
  name: 'Results',
  props: {
      budget: {}
  }
}
</script>
