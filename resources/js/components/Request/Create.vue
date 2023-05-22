<template>
    <v-card title="Создать новую заявку" subtitle="Заполните ниже указанные поля">
        <v-card-item class="create_card_content">
            <v-row>
                <v-col
                    cols="12"
                    md="6">
                    <v-text-field
                        v-model="data.first_name"
                        :counter="10"
                        label="Имя"
                    ></v-text-field>
                </v-col>

                <v-col
                    cols="12"
                    md="6">
                    <v-text-field
                        v-model="data.last_name"
                        :counter="7"
                        label="Фамилия"
                    ></v-text-field>
                </v-col>

                <v-col
                    cols="12"
                    md="6">
                    <v-text-field
                        v-model="data.email"
                        label="E-mail"
                    ></v-text-field>
                </v-col>

                <v-col
                    cols="12"
                    md="6"
                >
                    <VueDatePicker
                        v-model="data.date"
                        vertical
                        required
                        :format="format"
                        cancelText="Отмена"
                        selectText="Сохранить"
                        locale="ru"></VueDatePicker>
                </v-col>

                <v-col cols="12"
                       md="6">
                    <v-select
                        v-model="data.type"
                        :items="items"
                        label="Тип заявки"
                    ></v-select>
                </v-col>
            </v-row>

        </v-card-item>
        <v-card-actions>
            <v-btn @click="sendRequest">Отправить заявку</v-btn>
        </v-card-actions>
    </v-card>
</template>

<script>
import VueDatePicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css'
import data from "bootstrap/js/src/dom/data";
export default {
    components: {
        VueDatePicker
    },
    data () {
        return {
            data: {
                first_name: '',
                last_name: '',
                email: '',
                date: '',
                type: ''
            },
            items: [
                'доверенность',
                'наследство',
                'справка'
            ],
            modal: false,
        }
    },
    methods: {
        format (date) {
            const day = date.getDate();
            const month = date.getMonth() + 1;
            const year = date.getFullYear();
            const hour = date.getHours();
            let minute = date.getMinutes();
            if (minute == 0)
                minute = '00';

            return `Выбранная дата и время ${year}-${month}-${day} ${hour}:${minute}`;
        },
        sendRequest() {
            fetch(window.origin + '/save_data', {
                headers: {
                    'Content-Type': 'application/json'
                },
                method: 'POST',
                body: JSON.stringify(this.data)
            })
                .then(response => response.json())
                .then(response => {
                    if (response.status === 'success')
                        window.location.reload();
                }).catch(error => console.log(error));
        }
    }
}
</script>


<style >
.v-card {
    overflow: visible !important;
}
.v-card-item__content {
    overflow: visible !important;
}
</style>
