<template>
    <button :class="classes" @click="subscribe">Subscribe</button>
</template>

<script>
    export default {
        props: ['isActive'],

        data() {
            return {
                active: this.isActive
            }
        },

        computed: {
            classes() {
                return ['btn', this.active ? 'btn-primary' : 'btn-default'];
            }
        },

        methods: {
            subscribe() {
                axios[
                    (this.active ? 'delete' : 'post')
                    ](location.pathname + '/subscriptions');

                this.active =  ! this.active;
            }
        }
    }
</script>