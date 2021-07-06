<template>
    <section>
        <h1 class="mb-3">Добавить тур</h1>

        <form @submit="form_submited">
            <div class="card mb-4">
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
                            <input type="number" v-model="tour.price_discount" 
                                :max="tour.price" 
                                :min="0"
                                class="form-control" 
                                :disabled="!is_price_discount"
                                >
                            <span class="input-group-text">₽</span>
                        </div>
                    </div>
                    <div>
                        <label class="form-label">Карточка</label>
                        <input class="form-control" type="file" @change="tour_image_changed" ref="tour_image">
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-body">
                    <div class="mb-3">
                        <h3>Подробная информация</h3>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Полное описание</label>
                        <vue-editor v-model="tour.info.description"></vue-editor>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Длительность</label>
                        <input type="number" class="form-control" v-model="tour.info.duration">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Кол-во людей</label>
                        <input type="number" class="form-control" v-model="tour.info.people">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Ссылка на youtube видео</label>
                        <input type="text" placeholder="https://www.youtube.com/embed/dQw4w9WgXcQ" class="form-control" v-model="tour.info.video_href">
                    </div>
                    <div class="input-group mb-3">
                        <label class="input-group-text">Сезон</label>
                        <select v-model="tour.info.season" class="form-select">
                            <option :value="null" selected>
                                Выберете сезон
                            </option>
                            <option v-for="season in seasons" :key="season.id" :value="season.id">
                                {{ season.name }}
                            </option>
                        </select>
                    </div>
                    <div class="input-group">
                        <label class="input-group-text">Сложность</label>
                        <select v-model="tour.info.complexity" class="form-select">
                            <option :value="null" selected>
                                Выберете сложность
                            </option>
                            <option v-for="complexity in complexities" :key="complexity.id" :value="complexity.id">
                                {{ complexity.name }}
                            </option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-body">
                    <div class="mb-3">
                        <h3>Категории</h3>
                    </div>
                    <div class="input-group mb-3">
                        <select class="form-select" v-model="tag_to_add" >
                            <option v-for="tag in tags" :key="tag.id" :value="tag.id">
                                {{ tag.name }}
                            </option>
                        </select>
                        <button class="btn btn-primary" type="button" @click="add_tag()">Добавить</button>
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
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-body">
                    <div class="mb-3">
                        <h3>Локации</h3>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Название</label>
                        <input type="text" class="form-control" v-model="location_to_add.title">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Картинка</label>
                        <input class="form-control" type="file" @change="location_image_changed" ref="location_image">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Содержание</label>
                        <vue-editor v-model="location_to_add.description"></vue-editor>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary" type="button" @click="add_location()">Добавить</button>
                    </div>

                    <div class="card mb-3" v-for="location in tour.locations" :key="location.key">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img :src="location.image_path" class="img-fluid rounded-start">
                            </div>
                            <div class="col-md-6">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        {{ location.title }}
                                    </h5>
                                    <p class="card-text" v-html="location.description"></p>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="card-body">
                                    <button type="button" class="btn btn-danger btn-sm"
                                        @click="remove_location(location)"
                                        >
                                        Удалить
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-body">
                    <div class="mb-3">
                        <h3>Услуги</h3>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Содержание</label>
                        <vue-editor v-model="service_to_add.description"></vue-editor>
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" 
                                v-model="service_to_add.in_price" 
                                :value="true"
                                id="service_in_price_radio"
                                >
                            <label class="form-check-label" for="service_in_price_radio">
                                Включено в стоимость
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" 
                                v-model="service_to_add.in_price" 
                                :value="false"
                                id="service_not_in_price_radio"
                                >
                            <label class="form-check-label" for="service_not_in_price_radio">
                                Не включено в стоимость
                            </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary" type="button" @click="add_service()">Добавить</button>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <h4 class="mb-3">Включено в стоимость</h4>
                            <div v-for="service in tour.services.filter(s => { return s.in_price; })" 
                                :key="service.key"
                                class="card mb-3"
                                >
                                <div class="card-body" v-html="service.description"></div>
                            </div>
                        </div>
                        <div class="col-6">
                            <h4 class="mb-3">Не включено в стоимость</h4>
                            <div v-for="service in tour.services.filter(s => { return !s.in_price; })" 
                                :key="service.key"
                                class="card mb-3"
                                >
                                <div class="card-body" v-html="service.description"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert" v-if="form_validated == false">
                <strong>Ошибка</strong> Не все поля заполнены
            </div>

            <div class="alert alert-success alert-dismissible fade show mb-4" role="alert" v-if="tour_created == true">
                <strong>Отлично</strong> Тур создан <a :href="'/tours/' + addded_tour_id">Посмотреть</a>
            </div>

            <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert" v-if="tour_created == false">
                <strong>Ошибка</strong> Тур не создан
            </div>

            <button class="btn btn-success" type="submit">Добавить тур</button>
        </form>
    </section>
</template>

<script>
import { VueEditor } from 'vue2-editor';

export default {
    components: {
        VueEditor
    },

    data() {
        return {
            tour: {
                title: '',
                description: '',
                price: 0,
                price_discount: null,
                image: null,
                image_path: '',

                info: {
                    description: '',
                    duration: 1,
                    people: 1,
                    season: null,
                    complexity: null,
                    video_href: ''
                },

                tags: [],
                locations: [],
                services: []
            },

            is_price_discount: false,

            tags: [],
            tag_to_add: null,

            seasons: [],
            complexities: [],

            location_to_add: {
                key: null,
                title: '',
                description: '',
                image: null,
                image_path: ''
            },

            service_to_add: {
                key: null,
                description: '',
                in_price: true
            },

            form_validated: null,
            tour_created: null,
            addded_tour_id: null
        }
    },

    watch: {
        'is_price_discount': function (val) {
           if (!this.is_price_discount) this.tour.price_discount = null;
        }
    },

    created() {
        this.get_tags();
        this.get_seasons();
        this.get_complexities();
    },
    
    methods: {
        async get_tags() {
            try {
                let response = await axios.get("/api/tags");
                this.tags = response.data;
            } catch (error) {
                console.error(error);
            }
        },

        async get_seasons() {
            try {
                let response = await axios.get("/api/seasons");
                this.seasons = response.data;
            } catch (error) {
                console.error(error);
            }
        },

        async get_complexities() {
            try {
                let response = await axios.get("/api/complexities");
                this.complexities = response.data;
            } catch (error) {
                console.error(error);
            }
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
            this.tour.locations.push({
                key: Date.now(),
                title: this.location_to_add.title,
                description: this.location_to_add.description,
                image: this.location_to_add.image,
                image_path: this.location_to_add.image_path
            });

            this.location_to_add.title = '';
            this.location_to_add.description = '';
            this.location_to_add.image = null;
            this.location_to_add.image_path = '';

            this.$refs.location_image.value = null;
        },

        remove_location(location) {
            this.tour.locations = this.tour.locations.filter(l => {
                return location.key != l.key;
            });
        },

        location_image_changed(event) {
            this.location_to_add.image = event.target.files[0];
            this.location_to_add.image_path = URL.createObjectURL(this.location_to_add.image);
        },

        tour_image_changed(event) {
            this.tour.image = event.target.files[0];
            this.tour.image_path = URL.createObjectURL(this.tour.image);
        },

        add_service() {
            this.tour.services.push({
                key: Date.now(),
                description: this.service_to_add.description,
                in_price: this.service_to_add.in_price
            });

            this.service_to_add.description = '';
        },

        form_submited(event) {
            event.preventDefault();

            this.form_validated = null; 

            if (!this.validate()) {
                this.form_validated = false;
                return;
            }

            this.form_validated = true;

            let form_data = new FormData();

            // tour data
            form_data.append('title', this.tour.title);
            form_data.append('description', this.tour.description);
            form_data.append('price', this.tour.price);
            form_data.append('price_discount', this.tour.price_discount);
            form_data.append('image', this.tour.image);
            
            // tour info data
            form_data.append('info_people', this.tour.info.people);
            form_data.append('info_duration', this.tour.info.duration);
            form_data.append('info_season', this.tour.info.season);
            form_data.append('info_complexity', this.tour.info.complexity);
            form_data.append('info_description', this.tour.info.description);
            form_data.append('info_video', this.tour.info.video_href);

            // tour tags foreign ids
            form_data.append('tags', JSON.stringify( this.tour.tags.map(t => { return t.id; }) ) );
            
            // tour locations
            form_data.append('locations', JSON.stringify(
                this.tour.locations.map(l => {
                    return {
                        title: l.title,
                        description: l.description
                    };
                })
            ));
            
            // tour locations' images
            for (let i = 0; i < this.tour.locations.length; i++)
                form_data.append('locations_image_' + (i+1), this.tour.locations[i].image);

            // tour services
            form_data.append('services', JSON.stringify(
                this.tour.services.map(s => {
                    return {
                        description: s.description,
                        in_price: s.in_price
                    };
                })
            ));

            this.send_form(form_data);
        },

        async send_form(form_data) {
            try {
                let response = await axios.post("/api/tours", form_data);
                if (response.data.status == 1) {
                    this.tour_created = true;
                    this.addded_tour_id = response.data.id;
                }
                else 
                    this.tour_created = false;
            } catch(error) {

            }
        },

        validate() {
            if ( !(this.tour.image) ) return false;
            
            if ( !(this.tour.title.length > 0 && this.tour.description.length > 0) ) return false;
            
            if ( !(this.tour.info.season != null && this.tour.info.complexity != null) ) return false;

            if ( !(this.tour.info.duration != '' && this.tour.info.people != '') ) return false;

            if ( !(this.tour.info.description != '') ) return false;

            return true;
        }
    }
}
</script>