<template>
    <section>
        <div class="card mb-4">
            <div class="card-body">
                <h1 class="mb-0">Добавить тур</h1>
            </div>
        </div>

        <main-form v-on:tour-created="tour_created" />
        
        <info-form v-if="created_tour_id" :created_tour_id="created_tour_id" />
    </section>
</template>

<script>
import MainForm from './MainForm';
import InfoForm from './InfoForm';

export default {
    components: {
        'main-form': MainForm,
        'info-form': InfoForm
    },

    data() {
        return {
            created_tour_id: null,
        }
    },

    methods: {
        tour_created(tour_id) {
            this.created_tour_id = tour_id;
        }
    },
}
</script>