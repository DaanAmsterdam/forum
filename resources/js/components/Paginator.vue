<template>
    <ul  v-if="shouldPaginate" class="pagination">
        <li v-show="prevUrl" class="page-item">
            <a class="page-link" href="#" tabindex="-1" rel="prev" @click.prevent="page--">Previous</a>
        </li>

        <li  v-show="nextUrl" class="page-item">
            <a class="page-link" href="#" rel="next" @click.prevent="page++">Next</a>
        </li>
    </ul>
</template>

<script>
    export default {
        props: ['dataSet'],

        data() {
            return {
                page: 1,
                prevUrl: false,
                nextUrl: false
            }
        },

        watch: {
            dataSet() {
                this.page = this.dataSet.current_page;
                this.prevUrl = this.dataSet.prev_page_url;
                this.nextUrl = this.dataSet.next_page_url;
            },

            page() {
                this.broadcast().updateUrl();
            }
        },

        computed: {
            shouldPaginate() {
                return !! this.prevUrl || !! this.nextUrl;
            }
        },

        methods: {
            broadcast() {
                return this.$emit('changed', this.page);
            },

            updateUrl() {
                history.pushState(null, null, '?page' + this.page);
            }
        }

    }
</script>