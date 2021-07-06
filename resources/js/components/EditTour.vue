<template>
    <section>
        <h1 class="mb-3">Редактировать тур</h1>

        <div v-if="tour">

            <form class="card mb-4" @submit="main_form_submited">
                <div class="card-body">
                    <div class="mb-3">
                        <h3>Основная информация</h3>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Название</label>
                        <input type="text" class="form-control" v-model="tour.title">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Краткое описание для карточки</label>
                        <textarea rows="5" class="form-control" v-model="tour.description"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Стоимость</label>
                        <input type="number" min="0" class="form-control" v-model="tour.price">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Стоимость по скидке</label>
                        <div class="input-group">
                            <select class="form-select" v-model="is_price_discount">
                                <option :value="false" :selected="!is_price_discount">
                                    Нет
                                </option>
                                <option :value="true" :selected="is_price_discount">
                                    Есть
                                </option>
                            </select>
                            <input type="number" v-model="tour.discount_price" 
                                :max="tour.price" 
                                :min="0"
                                class="form-control" 
                                :disabled="!is_price_discount"
                                >
                            <span class="input-group-text">₽</span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label mb-3">Карточка</label>
                        <img v-if="new_image == null" class="img-fluid mb-3" 
                            :src="'/images/storage/tours/' + id + '/' + tour.image_path"
                            >
                        <img v-if="new_image != null" class="img-fluid mb-3" 
                            :src="new_image_path"
                            >
                        <input class="form-control" type="file" @change="tour_image_changed" ref="tour_image">
                    </div>
                    <div>
                        <button class="btn btn-success" type="submit">Обновить</button>
                    </div>
                </div>
            </form>

            <div class="alert alert-success alert-dismissible fade show mb-4" role="alert" v-if="main_form_updated == true">
                <strong>Отлично</strong> Данные обновлены
            </div>

            <form class="card mb-4" @submit="info_form_submited">
                <div class="card-body">
                    <div class="mb-3">
                        <h3>Подробная информация</h3>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Полное описание</label>
                        <vue-editor v-model="info.description"></vue-editor>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Длительность</label>
                        <input type="number" class="form-control" v-model="info.duration">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Кол-во людей</label>
                        <input type="number" class="form-control" v-model="info.people_amount">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Ссылка на youtube видео</label>
                        <input type="text" class="form-control" v-model="info.video_path">
                    </div>
                    <div>
                        <button class="btn btn-success" type="submit">Обновить</button>
                    </div>
                </div>
            </form>

            <div class="alert alert-success alert-dismissible fade show mb-4" role="alert" v-if="info_form_updated == true">
                <strong>Отлично</strong> Данные обновлены
            </div>

            <form class="card mb-4" @submit="tags_form_submited">
                <div class="card-body">
                    <div class="mb-3">
                        <h3>Категории</h3>
                    </div>
                    <div class="input-group mb-3">
                        <select class="form-select" v-model="tag_to_add">
                            <option v-for="tag in tags" :key="tag.id" :value="tag.id">
                                {{ tag.name }}
                            </option>
                        </select>
                        <button class="btn btn-primary" type="button" @click="add_tag">Добавить</button>
                    </div>
                    <div>
                        <button 
                            v-for="tag in tour.tags" :key="tag.id" 
                            class="btn btn-primary mb-3 me-3"
                            @click="remove_tag(tag)"
                            >
                            {{ tag.name }} <span class="badge bg-danger">удалить</span>
                        </button>
                    </div>
                    <div>
                        <button class="btn btn-success" type="submit">Обновить</button>
                    </div>
                </div>
            </form>

            <div class="alert alert-success alert-dismissible fade show mb-4" role="alert" v-if="tags_form_updated == true">
                <strong>Отлично</strong> Данные обновлены
            </div>

            <form class="card mb-4"  @submit="locations_form_submited">
                <div class="card-body">
                    <div class="mb-3">
                        <h3>Локации</h3>
                    </div>

                    <!-- <div class="mb-3">
                        <label for="" class="form-label">Название</label>
                        <input type="text" class="form-control" v-model="location_to_add.name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Картинка</label>
                        <input class="form-control" type="file" @change="new_location_image_changed" ref="new_location_image">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Содержание</label>
                        <vue-editor v-model="location_to_add.description"></vue-editor>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary" type="button" @click="add_location">Добавить</button>
                    </div> -->

                    <div class="card mb-3" v-for="location in info.locations" :key="location.id">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <div class="card-body">
                                    <img 
                                        v-if="!location.new_image && !location.created_image"
                                        class="img-fluid mb-3"
                                        :src="'/images/storage/tours/' + tour.id + '/locations/' + location.image_path"
                                        >
                                    <img 
                                        v-if="location.created_image && !location.new_image"
                                        class="img-fluid mb-3"
                                        :src="location.created_image_path"
                                        >
                                    <img 
                                        v-else
                                        class="img-fluid mb-3"
                                        :src="location.new_image_path"
                                        >
                                    <input class="form-control" type="file" @change="location_image_changed" 
                                        :ref="'location_image_' + location.id"
                                        v-bind:data-id="location.id"
                                        >
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <p class="card-text">
                                        <input type="text" class="form-control mb-3" v-model="location.name">
                                        <vue-editor v-model="location.description"></vue-editor>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-success" type="submit">Обновить</button>
                    </div>
                </div>
            </form>

            <div class="alert alert-success alert-dismissible fade show mb-4" role="alert" v-if="locations_form_updated == true">
                <strong>Отлично</strong> Данные обновлены
            </div>

        </div>
        
    </section>
</template>

<script>
import { VueEditor } from 'vue2-editor';

export default {
    components: {
        VueEditor
    },

    props: [
        'id'
    ],
    
    data() {
        return {
            tour: null,
            info: null,

            new_image: null,
            new_image_path: '',
            is_price_discount: false,

            tags: [],
            tag_to_add: null,

            location_to_add: {
                name: '',
                description: '',
                image: '',
                image_path: ''
            },

            main_form_updated: null,
            info_form_updated: null,
            tags_form_updated: null,
            locations_form_updated: null,
        }
    },

    watch: {
        'is_price_discount': function (val) {
           if (!this.is_price_discount) this.tour.discount_price = null;
        }
    },

    created() {
        const start = async () => {
            try {
                let response = await axios.get('/api/tours/' + this.id );
                this.tour = response.data.tour;
                this.info = response.data.info;

                this.is_price_discount = (this.tour.discount_price != null);
            } catch (error) {
                console.error(error);
            }

            try {
                let response = await axios.get("/api/tags");
                this.tags = response.data;
                
                const ids = this.tour.tags.map(t => { return t.id; });
                this.tags = this.tags.filter(t => {
                    return ids.indexOf(t.id) < 0;
                });

            } catch (error) {
                console.error(error);
            }
        };

        start();
    },

    methods: {
        tour_image_changed(event) {
            this.new_image = event.target.files[0];
            this.new_image_path = URL.createObjectURL(this.new_image);
        },

        location_image_changed(event) {
            let id = event.target.getAttribute('data-id');

            this.info.locations = this.info.locations.map(l => { 
                if (l.id == id) {
                    l.new_image = event.target.files[0];
                    l.new_image_path = URL.createObjectURL(l.new_image);
                }

                return l; 
            });
        },

        new_location_image_changed(event) {
            this.location_to_add.image = event.target.files[0];
            this.location_to_add.image_path = URL.createObjectURL(this.location_to_add.image);
        },

        add_tag() {
            this.tour.tags.push(
                this.tags.filter(t => { return t.id == this.tag_to_add; })[0]
            );

            this.tags = this.tags.filter(t => {
                return t.id != this.tag_to_add;
            });
        },

        remove_tag(tag) {
            this.tour.tags = this.tour.tags.filter(t => {
                return t.id != tag.id;
            });

            this.tags.push(tag);
        },

        add_location() {
            this.info.locations.push({
                id: null,
                name: this.location_to_add.name,
                is_new: true,
                description: this.location_to_add.description,
                created_image: this.location_to_add.image,
                created_image_path: this.location_to_add.image_path
            });
        },

        main_form_submited(event) {
            event.preventDefault();

            this.main_form_updated = null;
            this.info_form_updated = null;
            this.tags_form_updated = null;
            this.locations_form_updated = null;

            const form_data = new FormData();
            form_data.append('title', this.tour.title);
            form_data.append('description', this.tour.description);
            form_data.append('price', this.tour.price);
            form_data.append('discount_price', this.tour.discount_price);
            form_data.append('new_image', this.new_image ? this.new_image : null);

            this.send_main_form(form_data);
        },

        info_form_submited(event) {
            event.preventDefault();

            this.main_form_updated = null;
            this.info_form_updated = null;
            this.tags_form_updated = null;
            this.locations_form_updated = null;

            const form_data = new FormData();
            form_data.append('description', this.info.description);
            form_data.append('people', this.info.people_amount);
            form_data.append('duration', this.info.duration);
            form_data.append('video', this.info.video_path);

            this.send_info_form(form_data);
        },

        tags_form_submited(event) {
            event.preventDefault();

            this.main_form_updated = null;
            this.info_form_updated = null;
            this.tags_form_updated = null;
            this.locations_form_updated = null;

            const form_data = new FormData();
            form_data.append('tags', JSON.stringify( this.tour.tags.map(t => { return t.id; }) ));

            this.send_tags_form(form_data);
        },

        locations_form_submited(event) {
            event.preventDefault();

            this.main_form_updated = null;
            this.info_form_updated = null;
            this.tags_form_updated = null;
            this.locations_form_updated = null;

            const form_data = new FormData();
            
            this.info.locations.forEach(location => {
                if (location.new_image)
                    form_data.append('location_image_' + location.id, location.new_image);
            });

            let new_locations = [];

            this.info.locations.forEach(location => {
                new_locations.push({
                    id: location.id,
                    name: location.name,
                    description: location.description,
                    is_new_image: location.new_image != null
                })
            });

            form_data.append('locations', JSON.stringify(new_locations));

            this.send_locations_form(form_data);
        },

        async send_main_form(form_data) {
            form_data.append('method', 'main');

            try {
                let response = await axios.post('/api/tours/' + this.id, form_data);
                if (response.data.status == 1) {
                    this.main_form_updated = true;
                }
            } catch(error) {

            }
        },

        async send_info_form(form_data) {
            form_data.append('method', 'info');
            
            try {
                let response = await axios.post('/api/tours/' + this.id, form_data);
                if (response.data.status == 1) {
                    this.info_form_updated = true;
                }
            } catch(error) {

            }
        },

        async send_tags_form(form_data) {
            form_data.append('method', 'tags');
            
            try {
                let response = await axios.post('/api/tours/' + this.id, form_data);
                if (response.data.status == 1) {
                    this.tags_form_updated = true;
                }
            } catch(error) {

            }
        },

        async send_locations_form(form_data) {
            form_data.append('method', 'locations');
            
            try {
                let response = await axios.post('/api/tours/' + this.id, form_data);
                if (response.data.status == 1) {
                    this.locations_form_updated = true;
                }
            } catch(error) {

            }
        }
    }
}
</script>