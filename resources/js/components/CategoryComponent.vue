<template>
  <ul class="categories">
    <li
      class="category"
      v-for="category in categories"
      :key="category.id"
    >
      <a
        href="#"
        :class="['category-'+ category.name.toLowerCase()]"
        @click="getCategoryMatchBook(category.id)"
      >{{ category.name }}
      </a>
    </li>
  </ul>
</template>

<script>
export default {
  data() {
    return {
      categories: [],
      books: [],
      categoryMode: ""
    }
  },
  created() {
    this.getCategories()
  },
  methods: {
    async getCategories() {
      try {
        const response = await axios.get("/admin/category");
        this.categories = response.data
      } catch (error) {
        console.log(error)
      }
    },
    async getCategoryMatchBook(categoryId) {
      try {
        this.categoryMode = "categorySearched"
        const response = await axios.get("/admin/book/category/", {
          params: {
            category_id: categoryId
          }
        })
        this.books = response.data
        this.$emit('categoryMatchBooks', this.books)
        this.$emit("mode", this.categoryMode)
      } catch (error) {
        console.log(error)
      }
    }
  },
}
</script>