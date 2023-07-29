const showToast = (text) => {
  Toastify({
    text: text,
    duration: 3000,
    close: true,
  }).showToast();
};

export default showToast;
