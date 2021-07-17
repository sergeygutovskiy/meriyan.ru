<template>
    <form class="card mb-4" @submit="send_form">
        <div class="card-body">
            <div class="mb-3">
                <h3>Основная информация</h3>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Название</label>
                <input type="text" class="form-control" v-model="title">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Краткое описание для карточки</label>
                <textarea rows="5" class="form-control" v-model="description"></textarea>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Стоимость</label>
                <div class="input-group">
                    <input type="number" min="0" class="form-control" v-model="price">
                    <span class="input-group-text">₽</span>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Стоимость по скидке</label>
                <div class="input-group">
                    <select class="form-select" v-model="is_discount_price">
                        <option 
                            :value="false" 
                            :selected="!is_discount_price"
                            >
                            Нет
                        </option>
                        <option 
                            :value="true" 
                            :selected="is_discount_price"
                            >
                            Есть
                        </option>
                    </select>
                    <input type="number" v-model="discount_price" 
                        class="form-control" 
                        :max="price" 
                        :min="0"
                        :disabled="!is_discount_price"
                        >
                    <span class="input-group-text">₽</span>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Карточка</label>
                <input class="form-control" type="file" @change="card_image_changed" ref="card_image">
            
                <img v-if="card_image" class="img-fluid mt-3" :src="card_image_path">
            </div>
            <div>
                <button class="btn btn-success" type="submit">Создать черновик</button>
            </div>
            <div 
                v-if="messages.created" 
                class="alert alert-success mt-3 mb-0" 
                role="alert"
                >
                Черновик создан, теперь можно указать подробную информацию для добавления тура
            </div>
            <div 
                v-else-if="messages.created == false" 
                class="alert alert-danger mt-3 mb-0" 
                role="alert"
                >
                Не все поля заполнены
            </div>
        </div>
    </form>
</template>

<script>
export default {
    data() {
        return {
            messages: {
                created: null,
            },

            title: '',
            description: '',
            price: 0,

            is_discount_price: false,
            discount_price: null,

            card_image: null,
            card_image_path: '',

            endpoint_url: '/api/v1/tours',
            created_tour_id: null,
        }
    },

    watch: {
        is_discount_price: function (val) {
            this.discount_price = this.is_discount_price ? 0 : null;
        },
    },

    methods: {
        card_image_changed() {
            this.card_image = this.$refs.card_image.files[0];
            this.card_image_path = URL.createObjectURL(this.card_image);
        },

        validate() {
            return (
                this.title.length > 0
                && this.description.length > 0
                && this.price != ''
                && this.card_image != null
            )
        },

        async send_form(e) {
            e.preventDefault();

            if ( !this.validate() ) {
                this.messages.created = false;
                return;
            }

            let form_data = new FormData();
            form_data.append('input', JSON.stringify({
                title: this.title,
                description: this.description,
                price: this.price,
                discount_price: this.discount_price
            }));
            form_data.append('card_image', this.card_image);
            
            try {
                let response = await axios.post(this.endpoint_url, form_data);
                this.created_tour_id = response.data.data.id;
                
                this.$emit('tour-created', this.created_tour_id);
                this.messages.created = true;

            } catch (error) { console.error(error); }
        },
    }
}
</script>