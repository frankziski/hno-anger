<template>
  <div :class="classes" @dblclick="open">        
    <h4>
      <k-writer
        ref="input"
        :inline="true"
        :marks="true"
        :placeholder="headingField.placeholder  || 'Headline…'"
        :value="content.heading"
        @input="update({ heading: $event })"
      />
    </h4>
    <div class="menusection" v-if="items.length">
      <div v-for="(item, index) in items" :key="index" class="menuitem">
        <k-writer
          ref="title"
          class="title"
          :inline="true"
          :marks="false"
          :value="item.itemtitle"
          @input="updateItem(content, index, 'itemtitle', $event)"
        />
        <k-writer
          class="details"
          ref="details"
          :marks="true"
          :value="item.itemdetails"
          @input="updateItem(content, index, 'itemdetails', $event)"
        />
        <k-input
          name="price"
          class="price"
          type="number"
          :value="item.itemprice"
          @input="updateItem(content, index, 'itemprice', $event)"
        />
      </div>
    </div>
  </div>
</template>

<script>
export default {
  computed: {
    classes() {
      return "k-custom-block k-block-align-" + this.content.aligncontent + ' block-width-' +  this.content.width;
    },
    headingField() {
      return this.field("heading") || '';
    },
    items() {
      return this.content.menuitems || {};
    }
  },
  methods: {
    updateItem(content, index, fieldName, value) {
      content.menuitems[index][fieldName] = value;
      this.$emit("update", {
          ...this.content,
          ...content
        });
    }
  },
};
</script>