// ParsleyConfig definition if not already set
window.ParsleyConfig = window.ParsleyConfig || {};
window.ParsleyConfig.i18n = window.ParsleyConfig.i18n || {};

// Define then the messages
window.ParsleyConfig.i18n['pt-br'] = $.extend(window.ParsleyConfig.i18n['pt-br'] || {}, {
  defaultMessage: "Este valor parece ser inv�lido.",
  type: {
    email:        "Este campo deve ser um email v�lido.",
    url:          "Este campo deve ser um URL v�lida.",
    number:       "Este campo deve ser um n�mero v�lido.",
    integer:      "Este campo deve ser um inteiro v�lido.",
    digits:       "Este campo deve conter apenas d�gitos.",
    alphanum:     "Este campo deve ser alfa num�rico."
  },
  notblank:       "Este campo n�o pode ficar vazio.",
  required:       "Este campo � obrigat�rio.",
  pattern:        "Este campo parece estar inv�lido.",
  min:            "Este campo deve ser maior ou igual a %s.",
  max:            "Este campo deve ser menor ou igual a %s.",
  range:          "Este campo deve estar entre %s e %s.",
  minlength:      "Este campo � pequeno demais. Ele deveria ter %s caracteres ou mais.",
  maxlength:      "Este campo � grande demais. Ele deveria ter %s caracteres ou menos.",
  length:         "O tamanho deste campo � inv�lido. Ele deveria ter entre %s e %s caracteres.",
  mincheck:       "Voc� deve escolher pelo menos %s op��es.",
  maxcheck:       "Voc� deve escolher %s op��es ou mais",
  check:          "Voc� deve escolher entre %s e %s op��es.",
  equalto:        "Este valor deveria ser igual."
});

// If file is loaded after Parsley main file, auto-load locale
if ('undefined' !== typeof window.ParsleyValidator)
  window.ParsleyValidator.addCatalog('pt-br', window.ParsleyConfig.i18n['pt-br'], true);
