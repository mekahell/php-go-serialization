FROM golang:alpine3.20 AS build-stage
WORKDIR /app
COPY cmd cmd
COPY internal internal
COPY go.mod go.sum ./
RUN go mod download && \
    CGO_ENABLED=0 GOOS=linux go build -o ./server ./cmd/api_server

FROM gcr.io/distroless/base-debian11 AS build-release-stage
WORKDIR /
COPY --from=build-stage --chown=nonroot:nonroot /app/server /server
ENV LISTEN_ADDR "0.0.0.0:8080"
EXPOSE 8080
USER nonroot:nonroot
ENTRYPOINT ["/server"]
