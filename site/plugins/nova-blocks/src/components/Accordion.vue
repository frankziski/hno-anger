<template>
  <div :class="classes" @dblclick="open">
    <h2 class="k-block-type-heading">
      <k-writer
        ref="input"
        :inline="true"
        :marks="true"
        :placeholder="headingField.placeholder  || 'Headline…'"
        :value="content.heading"
        @input="update({ heading: $event })"
      />
    </h2>
    <div v-if="content.items.length">
      <details
        class="k-block-type-accordion-item"
        v-for="(item, index) in items"
        :key="index"
      >
      <summary>
        <k-writer
          ref="summary"
          :inline="true"
          :marks="false"
          :value="item.content.summary"
          @input="updateItem(content, index, 'summary', $event)"
        />
      </summary>
      <div>
        <k-writer
          ref="details"
          :marks="true"
          :value="item.content.details"
          @input="updateItem(content, index, 'details', $event)"
        />
      </div>
      </details>
    </div>
    <div v-else>Items…</div>
  </div>
</template>

<script>
export default {
  computed: {
    items() {
      return this.content.items || {};
    },
    headingField() {
      return this.field("heading") || '';
    },
    classes() {
      return "k-custom-block k-block-align-" + this.content.alignblock + ' k-content-align-' +  this.content.aligncontent + ' block-width-' +  this.content.width;
    },
  },
  methods: {
    updateItem(content, index, name, value) {
      content.items[index].content[name]= value;
      this.$emit("update", {
          ...this.content,
          ...content
        });
    }
  },
};
</script>