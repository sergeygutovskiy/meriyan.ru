<template>
    <section>
        <div class="card mb-4">
            <div class="card-body d-flex justify-content-between align-items-center">
                <h1 class="mb-0">Заявки</h1>
            </div>
        </div>

        <ul class="list-group list-group-horizontal text-center mb-4">
            <router-link class="list-group-item list-group-item-action" 
                :to="{ name: 'feedback.selection-requests' }"
                >
                Запросы на подбор тура
            </router-link>
            <router-link class="list-group-item list-group-item-action" 
                :to="{ name: 'feedback.booking' }"
                >
                Бронирования
            </router-link>
            <router-link class="list-group-item list-group-item-action" 
                :to="{ name: 'feedback.questions' }"
                >
                Вопросы
            </router-link>
        </ul>

        <router-view></router-view>
    </section>
</template>

<script>
export default {
    data() {
        return {

        }
    }
}
</script>