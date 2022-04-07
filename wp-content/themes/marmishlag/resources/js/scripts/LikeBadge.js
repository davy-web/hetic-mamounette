jQuery(document).ready(function ($) {
  const allCards = $(".c-card .card-likeable");
  var eventLoad = false;

  // get post in favorite
  getFavorite().then((_) => eventLoad = true)

  // add listener on click favorite
  $(allCards).each(function () {
    $(this).on("click", async function (e) {
      e.preventDefault();
      if (eventLoad == false) {
        eventLoad = true;
        const likeId = $(this).prev().attr("data-id");
        const myInputs = $("[data-id=" + likeId + "]");
        const checkIsInFavorite = $(myInputs[0]).hasClass("favorite")
        const doAction = checkIsInFavorite ? "remove" : "add"

        await RemoveOrAddInFavorite(likeId, doAction, myInputs)
      }
      eventLoad = false;
    });
  });

  // ajax remove or add in favorite
  async function RemoveOrAddInFavorite(likeId, doAction, myInputs) {
    await $.ajax({
      url: '/wp-admin/admin-post.php',
      type: 'POST',
      data: `action=add_remove_favorite&postId= ${likeId}&do=${doAction}`,
      success: function (result) {
        if (result == "1") {
          for (let i = 0; i < myInputs.length; i++) {
            const element = myInputs[i];
            if ($(element).hasClass("favorite")) {
              $(element).prop("checked", "");
              $(element).removeClass("favorite");
              $(element).closest("article.c-card").removeClass("cardIsLove");
            } else {
              $(element).prop("checked", "true");
              $(element).addClass("favorite");
              $(element).closest("article.c-card").addClass("cardIsLove");
            }
          }
        }
      }
    });
  }

  // ajax get post 
  async function getFavorite() {
    eventLoad = true
    await $.ajax({
      url: '/wp-admin/admin-post.php',
      type: 'GET',
      data: `action=get_favorite`,
      success: function (result) {
        if (result != "error") {
          for (let j = 0; j < result.length; j++) {
            const idFavorite = result[j]['post_id'];
            const myInputs = $("[data-id=" + idFavorite + "]");
            for (let i = 0; i < myInputs.length; i++) {
              const element = myInputs[i];
              if ($(element).hasClass(`like-badge-${idFavorite}`)) {
                $(element).prop("checked", "true");
                $(element).addClass("favorite");
                $(element).closest("article.c-card").addClass("cardIsLove");
              }
            }
          }

        }

      }
    });
  }


  return false;
});
