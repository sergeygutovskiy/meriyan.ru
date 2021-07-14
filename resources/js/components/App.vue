<template>
    <main class="container mt-5 mb-5">
        <div class="row">
            <div class="col-3">
                <div class="list-group">
                    <router-link class="list-group-item list-group-item-action" :to="{ name: 'tours' }">
                        ТУРЫ
                    </router-link>
                    <router-link class="list-group-item list-group-item-action" :to="{ name: 'feedback' }">
                        ЗАЯВКИ
                    </router-link>
                </div>
            </div>
            <div class="col-9">
                <router-view />
            </div>
        </div>
    </main>
</template>

<script>
    export default {
        data() {
            return {
            }   
        }
    }
</script>