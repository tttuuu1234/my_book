<template>
  <div>
    <Header></Header>
    <Category></Category>
    <BookLists></BookLists>
  </div>
</template>

<script>
import Header from './HeaderComponent.vue'
import Category from './CategoryComponent.vue'
import BookLists from './BookListsComponent.vue'

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
    Category,
    BookLists
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