<template>
    <div class="container">
        <list :loading="loading" :data="data"/>
        <create/>
    </div>
</template>


<script>
import Create from "./components/Request/Create.vue";
import List from "./components/Request/List.vue";
export default {
    name: "App",
    components: {
        Create,
        List
    },
    data() {
        return {
            data: [],
            loading: true,
        }
    },
    created() {
        this.checkCookie();
    },
    methods: {
         async checkCookie() {
            try {
                axios.get("/check_user").then(response => {
                    if (response.data.status === 'success')
                        this.data = response.data.data;
                    else
                        this.data = [];
                    this.loading = false;
                }).catch(error => console.log(error));
            } catch (error) {
                console.log(error);
            }
        },
    },
}
</script>


<style scoped>
.container {
    width: 100%;
    padding: 20px;
    display: flex;
    flex-direction: column;
    gap: 20px;
}
</style>
