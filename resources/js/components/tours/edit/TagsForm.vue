<template>
    <form id="tags-form" class="card mb-4" @submit="send_form">
        <div class="card-body">
            <div class="mb-3">
                <h3>Категории</h3>
            </div>
            <div class="input-group mb-3">
                <select class="form-select" v-model="tag_to_add" >
                    <option :value="null" selected>
                        Выберете категорию
                    </option>
                    <option v-for="tag in tags" :key="tag.id" :value="tag.id">
                        {{ tag.name }}
                    </option>
                </select>
                <button 
                    class="btn btn-primary" 
                    type="button" 
                    @click="add_tag"
                    :disabled="this.tag_to_add == null"
                    >
                    Добавить
                </button>
            </div>
            <div>
                <button 
                    v-for="tag in added_tags" :key="tag.id" 
                    class="btn btn-light mb-3 me-3"
                    @click="remove_tag(tag)"
                    >
                    {{ tag.name }} <span class="badge bg-danger">удалить</span>
                </button>
            </div>
            <div>
                <button class="btn btn-success" type="submit">Обновить</button>
            </div>
            <div 
                v-if="messages.updated" 
                class="alert alert-success mt-3 mb-0" 
                role="alert"
                >
                Категории обновлены
            </div>
        </div>
    </form>
</template>

<script>
export default {
    props: [
        'id'
    ],
    
    data() {
        return {
            messages: {
                updated: null,
            },
            
            tags: [],

            added_tags: [],
            tag_to_add: null,

            endpoint_url: `/api/v1/tours/${this.id}/tags`,
            tags_endpoint_url: '/api/v1/tags',
            tour_tags_endpoint_url: `/api/v1/tours/${this.id}/tags`,
        }
    },

    async created() {
        const [tour_tags_response, tags_response] = await Promise.all([
            this.get_tour_tags(), this.get_tags()
        ]);

        this.added_tags = tour_tags_response.data.data.tags;
        this.tags = tags_response.data.data.tags;

        this.tags = this.tags.filter(tag => {
            return this.added_tags.map(t => { return t.id; }).indexOf(tag.id) == -1;
        });
    },

    methods: {
        reset_messages() {
            this.messages.updated = null;
        },

        async send_form(e) {
            e.preventDefault();
            
            let form_data = new FormData();
            form_data.append('input', JSON.stringify({
                'tags': this.added_tags.map(tag => { return tag.id })
            }));

            this.reset_messages();

            try {
                let response = await axios.post(this.endpoint_url, form_data);
                this.messages.updated = true;

            } catch (error) { console.error(error); }
        },

        add_tag() {
            this.added_tags.push(
                this.tags.filter(tag => { return tag.id == this.tag_to_add; })[0]
            );

            this.tags = this.tags.filter(tag => {
                return tag.id != this.tag_to_add;
            });

            this.tag_to_add = null;
        },

        remove_tag(tag) {
            this.tag_to_add = null;

            this.tags.push(
                this.added_tags.filter(t => { return t.id == tag.id; })[0]
            );

            this.added_tags = this.added_tags.filter(t => {
                return t.id != tag.id;
            });
        },

        get_tour_tags() {
            return axios.get(this.tour_tags_endpoint_url);
        },

        get_tags() {
            return axios.get(this.tags_endpoint_url);
        },
    }
}
</script>