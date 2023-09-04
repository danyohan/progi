<script>
export default {
    name: 'Errors',
    props: {
        errors: {}
    }
}
</script>

<template>
    <div class="mb-8 text-center my-2 bg-red-600 text-white font-bold p-3 uppercase">
        {{ errors }}
    </div>
</template>
