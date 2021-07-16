<template>
    <form id="main-form" class="card mb-4" @submit="send_form">
        <div class="card-body">
            <div class="mb-3">
                <h3>Основная информация</h3>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Название</label>
                <input type="text" class="form-control" v-model="edited_title">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Краткое описание для карточки</label>
                <textarea rows="5" class="form-control" v-model="edited_description"></textarea>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Стоимость</label>
                <div class="input-group">
                    <input type="number" min="0" class="form-control" v-model="edited_price">
                    <span class="input-group-text">₽</span>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Стоимость по скидке</label>
                <div class="input-group">
                    <select class="form-select" v-model="edited_is_discount_price">
                        <option 
                            :value="false" 
                            :selected="!edited_is_discount_price"
                            >
                            Нет
                        </option>
                        <option 
                            :value="true" 
                            :selected="edited_is_discount_price"
                            >
                            Есть
                        </option>
                    </select>
                    <input type="number" v-model="edited_discount_price" 
                        class="form-control" 
                        :max="edited_price" 
                        :min="0"
                        :disabled="!edited_is_discount_price"
                        >
                    <span class="input-group-text">₽</span>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Карточка</label>
                <input class="form-control" type="file" @change="card_image_changed" ref="card_image">
            
                <img
                    v-if="!new_card_image"
                    :src="`/images/storage/tours/${id}/${edited_image_path}`" 
                    class="img-fluid mt-3"
                    >
                <img
                    v-if="new_card_image" 
                    :src="new_card_image_path"
                    class="img-fluid mt-3"
                    >
            </div>

            <div class="d-flex justify-content-between">
                <button class="btn btn-success" type="submit">Обновить</button>
                <button 
                    class="btn btn-primary" 
                    type="button"
                    @click="reset()"
                    >
                        Сбросить
                    </button>
            </div>
            <div 
                v-if="messages.updated" 
                class="alert alert-success mt-3 mb-0" 
                role="alert"
                >
                Основная информация обновлена
            </div>
        </div>
    </form>
</template>

<script>
export default {
    props: [
        'id',
        'title',
        'description',
        'image_path',
        'price',
        'discount_price',
    ],

    data() {
        return {
            messages: {
                updated: null,
            },

            edited_title: this.title,
            edited_description: this.description,
            edited_image_path: this.image_path,
            edited_price: this.price,
            edited_discount_price: this.discount_price,
            edited_is_discount_price: this.discount_price != null,
        
            new_card_image: null,
            new_card_image_path: '',

            endpoint_url: `/api/v1/tours/${this.id}`,
        }
    },

    watch: {
        edited_is_discount_price: function (val) {
            this.edited_discount_price = this.edited_is_discount_price ? 0 : null;
        },
    },

    methods: {
        reset_messages() {
            this.messages.updated = null;
        },

        card_image_changed() {
            this.new_card_image = this.$refs.card_image.files[0];
            this.new_card_image_path = URL.createObjectURL(this.new_card_image);
        },

        reset() {
            this.edited_title = this.title;
            this.edited_description = this.description;
            this.edited_image_path = this.image_path;
            this.edited_price = this.price;
            this.edited_discount_price = this.discount_price;
            this.edited_is_discount_price = this.discount_price != null;

            this.new_card_image = null;
            this.new_card_image_path = '';
        },

        async send_form(e) {
            e.preventDefault();

            let form_data = new FormData();
            form_data.append('input', JSON.stringify({
                title: this.edited_title,
                description: this.edited_description,
                price: this.edited_price,
                discount_price: this.edited_is_discount_price ? this.edited_discount_price : null
            }));
            form_data.append('new_card_image', this.new_card_image ? this.new_card_image : '');
            
            this.reset_messages();

            try {
                let response = await axios.post(this.endpoint_url, form_data);
                this.messages.updated = true;

            } catch (error) { console.error(error); }
        },
    }
}
</script>