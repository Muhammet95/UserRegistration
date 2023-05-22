<template>
    <v-card title="Созданные вами заявки" class="list_card" :loading="loading">
        <v-card-text v-if="!loading && (data.length === 0)">
            <span>Заявок нет</span>
        </v-card-text>
        <v-card-item v-if="!loading && (data.length > 0)">
            <v-row class="list_row">
                <v-card
                    width="400px"
                    v-for="(item, index) in data"
                    :key="index"
                    :title="'Заявка на получение ' + item.type"
                    :text="'Дата и время: ' + item.date"
                ></v-card>
            </v-row>
        </v-card-item>
    </v-card>
</template>

<script>
export default {
    props: {
        loading: Boolean,
        data: Array,
    },
}
</script>


<style>
.list_card {
    padding-bottom: 40px;
}
.list_row {
    gap: 20px;
    justify-content: space-around;
}
</style>
