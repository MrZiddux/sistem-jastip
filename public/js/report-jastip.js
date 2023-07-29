import { displayErrors, clearErrors } from "./handle-error.js"

$(function () {
  const form = $("#form-jastip-date");
  const targetPartial = $("#js-packages-partial-target")
  const buttonJastipDate = $('#button-submit-jastip-date')

  $('.input-date').on('change', function() {
    const inputDate = $('.input-date')
    let isAllFilled = true
    inputDate.each(function() {
      if (!!$(this).val() === false) {
        isAllFilled = false
      }
    })
    if (isAllFilled) {
      buttonJastipDate.attr('disabled', false)
    } else {
      buttonJastipDate.attr('disabled', true)
    }
  })

  function setLoading(isLoading) {
    if (isLoading) {
      buttonJastipDate.attr('disabled', true)
      buttonJastipDate.html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...`)
    } else {
      buttonJastipDate.attr('disabled', false)
      buttonJastipDate.html(`Submit`)
    }
  }

  form.on('submit', function(e) {
    e.preventDefault()
    getPackages()
  })

  async function getPackages() {
    const formData = new FormData(form[0])
    targetPartial.html(PLACEHOLDER_ELEMENT)
    setLoading(true)
    try {
      const { data } = await axios.post(REPORT_JASTIP_URL, formData, {
        headers: {
          'Content-Type': 'multipart/form-data'
        }
      })

      targetPartial.html(data)
      clearErrors()
      setLoading(false)
    } catch (error) {
      displayErrors('#form-jastip-date', error.response.data.errors)
      console.log(error)
    }
  }

})
