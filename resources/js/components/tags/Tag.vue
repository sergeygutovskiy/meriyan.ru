<template>
    <form class="card mb-4" @submit="send_form">
        <div class="card-body">
            <div class="mb-3">
                <h4 class="mb-0">{{ name }}</h4>
            </div>
            <div class="mb-3">
                <textarea 
                    class="form-control" 
                    rows="4"
                    v-model="edited_description"
                    ></textarea>
            </div>
            <div>
                <button class="btn btn-success" type="submit">
                    Обновить
                </button>
            </div>
            <div 
                v-if="messages.updated" 
                class="alert alert-success mt-3 mb-0" 
                role="alert"
                >
                Категория обновлена
            </div>
        </div>
    </form>
</template>

<script>
export default {
    props: [
        'id',
        'name',
        'description'
    ],
    
    data() {
        return {
            messages: {
                updated: null,
            },

            edited_description: this.description,

            endpoint_url: `/api/v1/tags/${this.id}`,
        }
    },

    methods: {
        reset_messages() {
            this.messages.updated = null;
        },

        async send_form(e) {
            e.preventDefault();

            let form_data = new FormData();
            form_data.append('input', JSON.stringify({
                'description': this.edited_description
            }));
            form_data.append('new_image', this.new_image ? this.new_image : '');

            this.reset_messages();

            try {
                let response = await axios.post(this.endpoint_url, form_data);

                this.messages.updated = true;

            } catch (error) { console.error(error); }
        },
    }
}
</script>