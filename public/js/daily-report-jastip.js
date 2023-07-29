$(function () {
  const targetPartial = $("#js-packages-partial-target")
  async function getPackages() {
    targetPartial.html(PLACEHOLDER_ELEMENT)
    try {
      const { data } = await axios.get(DAILY_REPORT_JASTIP_URL)
      targetPartial.html(data)
    } catch (error) {
      console.log(error)
    }
  }
  if (!IS_CACHED) {
    getPackages()
  }
})
