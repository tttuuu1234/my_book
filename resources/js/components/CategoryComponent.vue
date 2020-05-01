<template>
  <ul class="categories">
    <li
      v-for="category in categories"
      :key="category.id"
    >
      <a href="#"
        :class="['category-'+ category.name.toLowerCase()]"
      >
      {{ category.name }}
      </a>
    </li>
  </ul>
</template>

<script>
export default {
  data() {
    return {
      categories: []
    }
  },
  created() {
    this.getCategories()
  },
  methods: {
    async getCategories() {
      try {
        const response = await axios.get('/admin/category');
        this.categories = response.data
      } catch (error) {
        console.log(error)
      }
    }
  },
}
</script>