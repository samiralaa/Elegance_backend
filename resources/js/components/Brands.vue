<template>
  <div class="brands-container">
    <h2>Brands</h2>
    <div v-if="loading" class="loading">Loading...</div>
    <div v-else-if="error" class="error">{{ error }}</div>
    <div v-else class="brands-list">
      <div v-for="brand in brands" :key="brand.id" class="brand-card">
        <h3>{{ brand.name_en }}</h3>
        <p>{{ brand.description_en }}</p>
      </div>
    </div>
  </div>
</template>

<script>
import brandService from '@/services/brandService';

export default {
  name: 'Brands',
  data() {
    return {
      brands: [],
      loading: true,
      error: null
    };
  },
  async created() {
    try {
      const response = await brandService.getAllBrands();
      this.brands = response.data.data;
    } catch (err) {
      this.error = 'Failed to load brands';
      console.error('Error loading brands:', err);
    } finally {
      this.loading = false;
    }
  }
};
</script>

<style scoped>
.brands-container {
  padding: 20px;
}

.brands-list {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
  gap: 20px;
  margin-top: 20px;
}

.brand-card {
  border: 1px solid #ddd;
  border-radius: 8px;
  padding: 15px;
  background: #fff;
  box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.brand-card h3 {
  margin: 0 0 10px 0;
  color: #333;
}

.brand-card p {
  margin: 0;
  color: #666;
}

.loading {
  text-align: center;
  padding: 20px;
  color: #666;
}

.error {
  color: #dc3545;
  text-align: center;
  padding: 20px;
}
</style> 