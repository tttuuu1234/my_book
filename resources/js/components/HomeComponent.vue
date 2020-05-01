<template>
  <div>
    <Header></Header>
    <Category></Category>
  </div>
</template>

<script>
import Header from './HeaderComponent.vue'
import Category from './CategoryComponent.vue'

export default {
  created() {
    this.getTopPage()
  },
  data() {
    return {
      users: {}
    }
  },
  components: {
    Header,
    Category
  },
  methods: {
    async getTopPage() {
      try {
        const response = await axios.get('/admin/top')
        this.users = response.data
      } catch (error) {
        console.log(error)
      }
    }
  },
}

</script>