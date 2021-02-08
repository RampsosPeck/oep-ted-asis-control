<template>
  <div>
    <qrcode-stream @init="onInit"></qrcode-stream>
  </div>
</template>

<script>

import { QrcodeStream, QrcodeDropZone, QrcodeCapture } from 'vue-qrcode-reader'

export default {

   components: {
    QrcodeStream,
    QrcodeDropZone,
    QrcodeCapture
  },

  methods: {
  async onInit (promise) {
    // show loading indicator

    try {
      const { capabilities } = await promise

      // successfully initialized
    } catch (error) {
      if (error.name === 'NotAllowedError') {
        // user denied camera access permisson
      } else if (error.name === 'NotFoundError') {
        // no suitable camera device installed
      } else if (error.name === 'NotSupportedError') {
        // page is not served over HTTPS (or localhost)
      } else if (error.name === 'NotReadableError') {
        // maybe camera is already in use
      } else if (error.name === 'OverconstrainedError') {
        // did you requested the front camera although there is none?
      } else if (error.name === 'StreamApiNotSupportedError') {
        // browser seems to be lacking features
      }
    } finally {
      // hide loading indicator
    }
  }
}
}
</script>

<style scoped>
button {
  position: absolute;
  left: 10px;
  top: 10px;
}

.error {
  color: red;
  font-weight: bold;
}
</style>