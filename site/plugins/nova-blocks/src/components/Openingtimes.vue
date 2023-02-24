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
    <div v-if="items.length">
      <dl :class="dlClasses">
        <template v-for="(item, index) in items">
          <dt :key="index">
            <k-writer
              ref="dtitle"
              :inline="true"
              :marks="true"
              :value="item.dt"
              @input="updateItem(content, index, 'dt', $event)"
            />
          </dt>
          <dd :key="index">
            <k-writer
              ref="ddesc"
              :marks="true"
              :value="item.dd"
              @input="updateItem(content, index, 'dd', $event)"
            />
          </dd>
        </template>
      </dl>
    </div>
    <div v-else>{{ $t('empty') }}</div>
  </div>
</template>

<script>
export default {
  computed: {
    items() {
      return this.content.dlist || {};
    },
    headingField() {
      return this.field("heading");
    },
    classes() {
      return "k-custom-block k-block-align-" + this.content.alignblock + ' k-content-align-' +  this.content.aligncontent + ' block-width-' +  this.content.width;
    },
    dlClasses() {
      return "k-dlist " + this.content.orientation;
    },
  },
  methods: {
    updateItem(content, index, fieldName, value) {
      content.dlist[index][fieldName] = value;
      this.$emit("update", {
          ...this.content,
          ...content
        });
    }
  },
};
</script>