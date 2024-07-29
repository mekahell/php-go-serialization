package httpproto

import (
	"fmt"
	user_service_v1 "github/mekahell/php-go-serialization/internal/proto/go"
	"net/http"
	"time"

	"google.golang.org/protobuf/proto"
	"google.golang.org/protobuf/types/known/timestamppb"
)

const (
	nbUsers             = 10
	ContentTypeProtobuf = "application/x-protobuf"
)

var users *user_service_v1.Users

func init() {
	usersList := make([]*user_service_v1.User, nbUsers)
	for i := 0; i < nbUsers; i++ {
		usersList[i] = &user_service_v1.User{
			FirstName:    fmt.Sprintf("First name %02d", i),
			LastName:     fmt.Sprintf("Last name %02d", i),
			EmailAddress: fmt.Sprintf("user%02d@example.org", i),
			CreatedAt:    timestamppb.New(time.Now().UTC()),
			UpdatedAt:    timestamppb.New(time.Now().UTC()),
		}
	}
	users = &user_service_v1.Users{
		Users: usersList,
	}
}

func HandleUsers(w http.ResponseWriter, r *http.Request) {
	switch r.Method {
	case http.MethodGet:
		handleGetUsers(w)
	case http.MethodPost:
		handlePostUsers(w, r)
	default:
		w.WriteHeader(http.StatusNotFound)
	}
}

func handleGetUsers(w http.ResponseWriter) {
	data, err := proto.Marshal(users)
	if err != nil {
		w.WriteHeader(http.StatusInternalServerError)
		w.Header().Add("Content-Type", "text/plain")
		w.Write([]byte(err.Error()))
		return
	}
	w.WriteHeader(http.StatusOK)
	w.Header().Add("Content-Type", ContentTypeProtobuf)
	w.Write(data)
}

func handlePostUsers(w http.ResponseWriter, r *http.Request) {

}
