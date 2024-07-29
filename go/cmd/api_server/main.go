package main

import (
	httpjson "github/mekahell/php-go-serialization/internal/http/json"
	httpproto "github/mekahell/php-go-serialization/internal/http/proto"
	"net/http"
	"os"

	"github.com/gorilla/mux"
)

func main() {
	// Read the environment variable to get the address to listen
	listenAddr, exists := os.LookupEnv("LISTEN_ADDR")
	if !exists {
		listenAddr = ":8080"
	}

	r := mux.NewRouter()

	s := r.NewRoute().Methods("GET", "POST").Path("/users").Subrouter()
	s.NewRoute().HeadersRegexp("Accept", httpproto.ContentTypeProtobuf).HandlerFunc(httpproto.HandleUsers)
	s.NewRoute().HeadersRegexp("Accept", "application/json").HandlerFunc(httpjson.HandleUsers)

	http.ListenAndServe(listenAddr, r)
}
