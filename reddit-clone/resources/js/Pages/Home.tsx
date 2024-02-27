import { PageProps } from "@/types";
import { Head, Link, useForm } from "@inertiajs/react";
import {
    Card,
    CardHeader,
    CardBody,
    CardFooter,
    Image,
    Input,
    Textarea,
    Button,
} from "@nextui-org/react";
import { FormEvent } from "react";

export default function ({
    auth,
    posts,
}: PageProps<{ laravelVersion: string; phpVersion: string; posts: any }>) {
    const { data, setData, post, processing, errors } = useForm({
        title: "",
        body: "",
        user_id: auth.user && auth.user.id,
    });

    const createPost = (e: FormEvent) => {
        e.preventDefault();
        post(route("posts.store"));
    };

    return (
        <>
            <Head title="Home" />
            <section className="p-4 grid gap-4">
                {auth.user && (
                    <Card>
                        <CardHeader className="flex gap-3">
                            <Image
                                alt="nextui logo"
                                height={40}
                                radius="full"
                                src="/assets/icon-b-bg-x-mas.png"
                                width={40}
                            />
                            <div className="flex flex-col">
                                <p className="text-md">{auth.user.name}</p>
                                <p className="text-small text-default-500">
                                    {auth.user.organization}
                                </p>
                            </div>
                        </CardHeader>
                        <form onSubmit={createPost}>
                            <CardBody className="grid gap-4">
                                <Input
                                    classNames={{
                                        input: "text-small border-0 !ring-transparent",
                                    }}
                                    placeholder="Title your new post..."
                                    required
                                    value={data.title}
                                    onChange={(e) =>
                                        setData("title", e.target.value)
                                    }
                                    errorMessage={errors.title}
                                />
                                <Textarea
                                    placeholder="Share you though fully here..."
                                    classNames={{
                                        input: "border-0 !ring-transparent",
                                    }}
                                    required
                                    onChange={(e) =>
                                        setData("body", e.target.value)
                                    }
                                    errorMessage={errors.title}
                                >
                                    {data.body}
                                </Textarea>
                            </CardBody>
                            <CardFooter className="justify-end">
                                <Button
                                    className="bg-blue-500 text-white"
                                    type="submit"
                                    disabled={processing}
                                >
                                    Post
                                </Button>
                            </CardFooter>
                        </form>
                    </Card>
                )}
                {posts.map((post: any) => (
                    <Link href={route("posts.show", post.id)}>
                        <Card key={post.id}>
                            <CardHeader className="flex gap-3">
                                <Image
                                    alt="nextui logo"
                                    height={40}
                                    radius="full"
                                    src="/assets/icon-b-bg-x-mas.png"
                                    width={40}
                                />
                                <div className="flex flex-col">
                                    <p className="text-md">{post.user.name}</p>
                                    <p className="text-small text-default-500">
                                        {post.user.organization}
                                    </p>
                                </div>
                            </CardHeader>
                            <CardBody className="font-bold">
                                <p>{post.title}</p>
                            </CardBody>
                            <CardFooter>
                                <p>{post.body}</p>
                            </CardFooter>
                        </Card>
                    </Link>
                ))}
            </section>
        </>
    );
}
