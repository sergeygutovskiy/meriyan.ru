<template>
    <section>
        <div class="card mb-4">
            <div class="card-body">
                <h1 class="mb-0">Категории</h1>
            </div>
        </div>

        <tag 
            v-for="tag in tags"
            :key="tag.id"
            :id="tag.id"
            :name="tag.name"
            :description="tag.description"
            :name_for_page="tag.page_name"
        />
    </section>
</template>

<script>
import Tag from './Tag';

export default {
    components: {
        Tag
    },

    data() {
        return {
            tags: [],

            tags_endpoint_url: '/api/v1/tags',
        }
    },

    async created() {
        const res = await this.get_tags();
        this.tags = res.data.data.tags;
    },

    methods: {
        get_tags() {
            return axios.get(this.tags_endpoint_url);
        },
    },
}
</script>