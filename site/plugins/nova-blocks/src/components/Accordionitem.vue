<template>
  <div class="k-custom-block" @dblclick="open">
    <details>
      <summary>
        <k-writer
            ref="summary"
            :inline="true"
            marks="false"
            :placeholder="summaryField.placeholder || 'Headline…'"
            :value="content.summary"
            @input="update({ summary: $event })"
        />
      </summary>
      
      <k-writer
          ref="details"
          :inline="detailsField.inline || false"
          :marks="detailsField.marks"
          :value="content.details"
          :placeholder="detailsField.placeholder || 'Details…'"
          @input="update({ details: $event })"
      />
    </details>
  </div>
</template>

<script>
export default {
  computed: {
    summaryField() {
      return this.field("summary");
    },
    detailsField() {
      return this.field("details");
    }
  }
};
</script>